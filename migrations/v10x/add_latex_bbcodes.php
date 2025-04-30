<?php
namespace bigbadaboom\latexrenderer\migrations\v10x;

class add_latex_bbcodes extends \phpbb\db\migration\migration
{
    public function update_data()
    {
        return [
            ['custom', [[$this, 'add_tex_bbcode']]],
            ['custom', [[$this, 'add_dtex_bbcode']]],
        ];
    }

    public function add_tex_bbcode()
    {
        $config = [
            'bbcode_id' => 100, // Predefine a high bbcode_id to avoid conflicts
            'bbcode_tag' => 'tex',
            'bbcode_match' => '[tex]{TEXT}[/tex]',
            'bbcode_tpl' => '<span class="mathjax">\( {TEXT} \)</span>',
            'display_on_posting' => 1,
            'bbcode_helpline' => 'Inline LaTeX equation: [tex]equation[/tex]',
            'first_pass_match' => '[tex](.*?)\[/tex\]',
            'first_pass_replace' => '<span class="mathjax">\( $1 \)</span>',
            'second_pass_match' => '\[tex\](.*?)\[/tex\]',
            'second_pass_replace' => '<span class="mathjax">\( $1 \)</span>'
        ];

        $sql = 'SELECT bbcode_id FROM ' . BBCODES_TABLE . " WHERE bbcode_tag = 'tex'";
        $result = $this->db->sql_query($sql);
        $row = $this->db->sql_fetchrow($result);
        $this->db->sql_freeresult($result);

        if ($row)
        {
            unset($config['bbcode_id']); // Don't update bbcode_id if it exists
            $sql = 'UPDATE ' . BBCODES_TABLE . ' SET ' . $this->db->sql_build_array('UPDATE', $config) . " WHERE bbcode_tag = 'tex'";
            $this->db->sql_query($sql);
        }
        else
        {
            $sql = 'INSERT INTO ' . BBCODES_TABLE . ' ' . $this->db->sql_build_array('INSERT', $config);
            $this->db->sql_query($sql);
        }

        return true;
    }

    public function add_dtex_bbcode()
    {
        $config = [
            'bbcode_id' => 101, // Predefine a high bbcode_id to avoid conflicts
            'bbcode_tag' => 'dtex',
            'bbcode_match' => '[dtex]{TEXT}[/dtex]',
            'bbcode_tpl' => '<span class="mathjax">\[ {TEXT} \]</span>',
            'display_on_posting' => 1,
            'bbcode_helpline' => 'Display LaTeX equation: [dtex]equation[/dtex]',
            'first_pass_match' => '[dtex](.*?)\[/dtex\]',
            'first_pass_replace' => '<span class="mathjax">\[ $1 \]</span>',
            'second_pass_match' => '\[dtex\](.*?)\[/dtex\]',
            'second_pass_replace' => '<span class="mathjax">\[ $1 \]</span>'
        ];

        $sql = 'SELECT bbcode_id FROM ' . BBCODES_TABLE . " WHERE bbcode_tag = 'dtex'";
        $result = $this->db->sql_query($sql);
        $row = $this->db->sql_fetchrow($result);
        $this->db->sql_freeresult($result);

        if ($row)
        {
            unset($config['bbcode_id']); // Don't update bbcode_id if it exists
            $sql = 'UPDATE ' . BBCODES_TABLE . ' SET ' . $this->db->sql_build_array('UPDATE', $config) . " WHERE bbcode_tag = 'dtex'";
            $this->db->sql_query($sql);
        }
        else
        {
            $sql = 'INSERT INTO ' . BBCODES_TABLE . ' ' . $this->db->sql_build_array('INSERT', $config);
            $this->db->sql_query($sql);
        }

        return true;
    }
}