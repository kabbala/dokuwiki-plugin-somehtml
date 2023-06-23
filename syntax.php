<?php
/**
 * DokuWiki Plugin someHTML (Syntax Component)
 *
 * https://github.com/kabbala/dokuwiki-plugin-somehtml/
 */

if (!defined('DOKU_INC')) { die(); }

class syntax_plugin_somehtml extends DokuWiki_Syntax_Plugin
{

    public function getType()
    {
        return 'substition';    // not typo.
    }

    public function getPType()
    {
        return 'normal';
    }

    public function getSort()
    {
        return 364;    // very late.
    }

    public function connectTo($mode)
    {
        $this->Lexer->addSpecialPattern("<ins>|</ins>", $mode, 'plugin_somehtml');
    }
	
    /**
     * Handle matches of the imagecdn syntax
     *
     * @param string       $match   The match of the syntax
     * @param int          $state   The state of the handler
     * @param int          $pos     The position in the document
     * @param Doku_Handler $handler The handler
     *
     * @return array Data for the renderer
     */
    public function handle($match, $state, $pos, Doku_Handler $handler)
    {
		$data = $match;
		return $data;
	}

    /**
     * Render xhtml output or metadata
     *
     * @param string        $mode     Renderer mode (supported modes: xhtml)
     * @param Doku_Renderer $renderer The renderer
     * @param array         $data     The data from the handler() function
     *
     * @return bool If rendering was successful.
     */
    public function render($mode, Doku_Renderer $renderer, $data)
    {
        if ($mode !== 'xhtml') {
            return false;
        }

		if ($data == "<ins>") {$renderer->doc .= "<ins>";}
		else if ($data == "</ins>") {$renderer->doc .= "</ins>";}
		
		return true;
    }
}