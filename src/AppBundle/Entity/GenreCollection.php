<?php

namespace AppBundle\Entity;

/**
 * @author abousquet
 *
 */
class GenreCollection implements \ArrayAccess, \Countable, \IteratorAggregate
{
    /**
     *
     * @var array
     */
    protected $genres = array();

    /**
     *
     * @var boolean
     */
    protected $sorted = true;

    /**
     *
     * @param array $genres
     */
    public function __construct(array $genres = array())
    {
        $this->addGenres($genres);
    }

    /**
     *
     * @param Genre $genre
     * @return $this
     */
    public function addGenre(Genre $genre)
    {
        $this->genres[$genre->getId()] = $genre;
        $this->sorted = false;

        return $this;
    }

    /**
     *
     * @param Genre[] $genres
     * @return $this
     */
    public function addGenres(array $genres)
    {
        foreach ($genres as $genre) {
            $this->addGenre($genre);
        }

        return $this;
    }

    /**
     * Remove genre
     *
     * @param Genre $genre
     */
    public function removeGenre(Genre $genre)
    {
        $this->genres->removeElement($genre);
    }

    /**
     *
     * @param array $genres
     * @return self
     */
    public function setGenres(array $genres)
    {
        $this->genres = array();
        return $this->addGenres($genres);
    }

    /**
     *
     * @return boolean
     */
    public function isSorted()
    {
        return $this->sorted;
    }

    /**
     *
     * @return $this
     */
    public function sortGenres()
    {
        uasort($this->genres, function ($a, $b) {
            if (strcoll($a->getMedium()->getLabel(), $b->getMedium()->getLabel()) === 0) {
                return strcoll($a->getLabel(), $b->getLabel());
            }
            return strcoll($a->getMedium()->getLabel(), $b->getMedium()->getLabel());
        });
        $this->sorted = true;

        return $this;
    }

    /**
     *
     * @return array
     */
    public function getGenres()
    {
        if (!$this->sorted) {
            $this->sortGenres();
        }

        return $this->genres;
    }

    /**
     *
     * @param array $genreIds
     * @return array
     */
    public function getTrailedSelection(array $genreIds)
    {
        $trailedSelection = array();
        foreach ($genreIds as $genreId) {
            $trail = $this->getTrail($genreId);
            $trailedSelection = array_merge_recursive($trailedSelection, $trail);
        }

        return $trailedSelection;
    }

    /**
     *
     * @param integer $genreId
     * @return array
     */
    public function getTrail($genreId)
    {
        if (isset($this[$genreId])) {
            return array($genreId);
        } else {
            foreach ($this as $genre) {
                $trail = $genre->getTrail($genreId);
                if (!empty($trail)) {
                    array_unshift($trail, $genre->getId());
                    return $trail;
                }
            }
        }
        return array();
    }

    /**
     *
     * @param int $genreId
     * @return Genre
     */
    public function getGenre($genreId)
    {
        if (isset($this[$genreId])) {

            return $this[$genreId];
        }
        foreach ($this as $subGenre) {
            $oGenre = $subGenre->getGenre($genreId);
            if (!is_null($oGenre)) {

                return $oGenre;
            }
        }
        return null;
    }

    /**
     *
     * @param array $genreIds
     * @return array
     */
    public function getMediumsSelection(array $genreIds)
    {
        $mediums = [];
        foreach ($genreIds as $genreId) {
            $medium = $this->getGenre($genreId)->getMedium();
            if (!is_null($medium)) {
                $mediums[] = $medium->getId();
            }
        }

        return $mediums;
    }

    /**
     *
     * @param integer $genreId
     * @return boolean
     */
    public function remove($genreId)
    {
        if (isset($this[$genreId])) {
            unset($this[$genreId]);
            return true;
        } else {
            foreach ($this as $genre) {
                if ($genre->remove($genreId)) {
                    return true;
                }
            }
        }
        return false;
    }

    public function getMediums()
    {
        $mediums = [];
        foreach ($this as $oGenre) {
            if (!in_array($oGenre->getMedium()->getId(), $mediums)) {
                $mediums[] = $oGenre->getMedium()->getId();
            }
        }
        return $mediums;
    }

    /**
     *
     * @param int $mediumId
     * @return bool
     */
    public function removeMedium($mediumId)
    {
        $deleted = false;
        foreach ($this as $genreId => $oGenre) {
            if (!is_null($oGenre->getMedium()) && $oGenre->getMedium()->getId() == $mediumId) {
                $this->remove($genreId);
                $deleted = true;
            }
        }

        return $deleted;
    }

    public static function buildTree(array $all)
    {
        foreach ($all as $oGenre) {
            $oGenre->loadChildrenWithDB(false);
        }

        return new self(self::innerBuildTree($all));
    }

    protected static function innerBuildTree(array $all, $oGenre = null)
    {
        $result = array();
        foreach ($all as $subKey => $oSubGenre) {

            if (!is_null($oGenre) && $oSubGenre->getParentId() == $oGenre->getId()) {
                self::innerBuildTree($all, $oSubGenre);
                $oGenre->addGenre($oSubGenre);

            } elseif (is_null($oGenre) && is_null($oSubGenre->getParentId())) {
                self::innerBuildTree($all, $oSubGenre);
                $result[$oSubGenre->getId()] = $oSubGenre;
            }
        }

        if (is_null($oGenre)) {
            return $result;
        } else {
            return $oGenre;
        }
    }

    public function __clone()
    {
        $allGenres = $this->genres;
        $this->genres = array();
        foreach ($allGenres as $id => $genre) {
            $this->genres[$id] = clone $genre;
        }
    }

    // Count method
    /**
     *
     * @return integer
     */
    public function count()
    {
        return count($this->genres);
    }

    // ArrayAccess methods

    /**
     * Tests if the given zone exists
     *
     * @param mixed $offset
     * @return boolean Wether the given genre exists in the Genre Collection
     */
    public function offsetExists($offset)
    {
        return isset($this->genres[$offset]);
    }

    /**
     * Retrieves the Genre having the provided identifier
     *
     * @param mixed $offset Identifier of the genre to retrieve
     * @return Genre Searched genre
     */
    public function offsetGet($offset)
    {
        return $this->genres[$offset];
    }

    /**
     * Removes the genre of the provided ID and appends the provided genre to the collection
     *
     * @param mixed $offset Identifier of the genre to replace or remove
     * @param array $value {@see Genre} instance to add
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if ($offset != $value->getId()) {
            throw new \Exception('The provided offset does not match the identifier of the provided Genre');
        }
        $this->offsetUnset($offset);
        $this->addGenre($value);
    }

    /**
     * Removes the provided genre if it is a direct child
     *
     * @param mixed $offset Child genre to remove
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->genres[$offset]);
    }

    // IteratorAggregate methods

    /**
     * Retrieves an iterator on the {@see $zones} array
     *
     * @return \ArrayIterator Iterator on direct child zones
     */
    public function getIterator()
    {
        if (!$this->sorted) {
            $this->sortGenres();
        }
        return new \ArrayIterator($this->genres);
    }
}
