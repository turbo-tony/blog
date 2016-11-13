<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 01/11/16
 * Time: 16:43
 */

namespace AppBundle\Entity\Traits;

use AppBundle\Entity\Genre;

use Doctrine\Common\Collections\ArrayCollection;

trait GenresTrait
{
    /**
     * @var ArrayCollection
     */
    private $genres;

    public function initGenres()
    {
        $this->genres = new ArrayCollection();
    }

    /**
     * Add genres
     *
     * @param Genre $genres
     * @return $this
     */
    public function addGenre(Genre $genres)
    {
        $this->genres[] = $genres;

        return $this;
    }

    /**
     * Remove genres
     *
     * @param Genre $genres
     */
    public function removeGenre(Genre $genres)
    {
        $this->genres->removeElement($genres);
    }

    /**
     * Get genres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenres()
    {
        return $this->genres;
    }

    public function setGenres($genres)
    {
        $this->genres = $genres;
    }
}
