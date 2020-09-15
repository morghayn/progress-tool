<?php defined('_JEXEC') or die;

/**
 * (Site) Class ProgressToolViewBeginner
 *
 * View for front-end technology decision plan functionality.
 *
 * @package ProgressTool
 * @subpackage site
 * @since 0.5.0
 *
 * @author  Morgan Nolan <morgan.nolan@hotmail.com>
 * @link    https://github.com/morghayn
 */
class ProgressToolViewBeginner extends JViewLegacy
{
    protected $form = null;

    /**
     * Display the project creator view.
     *
     * @param string $tpl The name of the layout file to parse.
     * @return  void
     */
    public function display($tpl = null)
    {
        JLoader::register('Authenticator',  JPATH_BASE . '/components/com_progresstool/helpers/Authenticator.php');
        Authenticator::redirectGuests();

        $this->form = $this->get('Form');

        parent::display($tpl);
        $this->prepareDocument();
    }

    /**
     * Prepares document by adding stylesheets and scripts.
     *
     * @since 0.5.0
     */
    protected function prepareDocument()
    {
        $document = JFactory::getDocument();
        $document->addStyleSheet(JURI::root() . "media/com_progresstool/css/projectform.css");
        $document->addScript(JURI::root() . "media/com_progresstool/forms/submitbutton.js");
    }
}