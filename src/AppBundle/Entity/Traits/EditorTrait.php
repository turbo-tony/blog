<?php
/**
 * Contains the Editor Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @copyright   ABPlus 2016
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */

namespace AppBundle\Entity\Traits;

use AppBundle\Entity\Editor;

/**
 * Editor Trait for entity classes
 *
 * @author      Antoine Bousquet <antoine.p.bousquet@gmail.com>
 * @package     Blog
 * @subpackage  AppBundle
 * @category    EntityTrait
 */
Trait EditorTrait
{
    /**
     * Editor
     *
     * @var Editor
     */
    protected $editor;

    /**
     * Set Editor
     *
     * @param Editor $editor
     * @return $this
     */
    public function setEditor(Editor $editor = null)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get Editor
     *
     * @return Editor
     */
    public function getEditor()
    {
        return $this->editor;
    }
}
