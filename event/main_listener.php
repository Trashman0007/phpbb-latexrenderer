<?php
namespace bigbadaboom\latexrenderer\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class main_listener implements EventSubscriberInterface
{
    protected $db;
    protected $template;

    public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\template\template $template)
    {
        $this->db = $db;
        $this->template = $template;
    }

    public static function getSubscribedEvents()
    {
        return [
            'core.text_formatter_s9e_configure_after' => 'configure_latex_bbcode',
        ];
    }

    public function configure_latex_bbcode($event)
    {
        // Ensure LaTeX BBCodes are not escaped
        $configurator = $event['configurator'];

        // Configure [tex] for inline math
        $configurator->BBCodes->addCustom(
            '[tex]{TEXT}[/tex]',
            '<span class="mathjax">\( {TEXT} \)</span>'
        );

        // Configure [dtex] for display math
        $configurator->BBCodes->addCustom(
            '[dtex]{TEXT}[/dtex]',
            '<span class="mathjax">\[ {TEXT} \]</span>'
        );
    }
}