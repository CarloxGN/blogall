<?php
function html_entity_invert($string) {
    $matches = $store = array();
    preg_match_all('/(&([^&;]+){2,6};)/', $string, $matches, PREG_SET_ORDER);

    foreach ($matches as $i => $match) {
        $key = '__STORED_ENTITY_' . $i . '__';
        $store[$key] = html_entity_decode($match[0]);
        $string = str_replace($match[0], $key, $string);
    }

    return str_replace(array_keys($store), $store, htmlentities($string));
}


/*
$str = '<code> &lt;div&gt; blabla &lt;/div&gt; </code>';
xml_parse_into_struct(xml_parser_create(), $str, $nodes);
$xmlArr = array();
foreach($nodes as $node) {
    echo htmlentities('<' . $node['tag'] . '>') . html_entity_decode($node['value']) . htmlentities('</' . $node['tag'] . '>');
}
*/
