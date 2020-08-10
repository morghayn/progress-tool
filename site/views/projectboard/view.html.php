<?php defined('_JEXEC') or die;

/**
 * Class ProgressToolViewProjectBoard
 *
 * View for front-end project board functionality.
 *
 * @package ProgressTool
 * @subpackage site
 * @since 0.1.2
 *
 * @author  Morgan Nolan <morgan.nolan@hotmail.com>
 * @link    https://github.com/morghayn
 * @license GNU General Public License version 2 or later; see LICENSE.txt
 */
class ProgressToolViewProjectBoard extends JViewLegacy
{
    /**
     * @var
     * @since 0.2.1
     */
    protected $redirect;

    /**
     * Renders view.
     *
     * @param null $tpl use default template.
     * @since 0.1.2
     */
    function display($tpl = null)
    {
        $this->user = JFactory::getUser();

        // TODO: Fetch User Projects
        $model = $this->getModel();
        $this->projects = array();
        $this->projects = $model->getUserProjects($this->user->id);

        // TODO: Generate Project Graph

        $this->preliminaryQuestions = $this->get('PreliminaryQuestions');

        $this->addStylesheet();
        $this->addScripts();

        // Display the view
        parent::display($tpl);
    }


    /**
     * // TODO comment
     * @since 0.2.6
     */
    private function addStylesheet()
    {
        $document = JFactory::getDocument();
        $document->addStyleSheet(JURI::root() . "media/com_progresstool/css/masterChest.css");
        $document->addStyleSheet(JURI::root() . "media/com_progresstool/css/optionsChest.css");
        $document->addStyleSheet(JURI::root() . "media/com_progresstool/css/projectboard.css");
    }

    /**
     * // TODO comment
     * @since 0.2.6
     */
    private function addScripts()
    {
        $document = JFactory::getDocument();
        $document->addScript(JURI::root() . "media/com_progresstool/js/projectboard.js");
    }
}