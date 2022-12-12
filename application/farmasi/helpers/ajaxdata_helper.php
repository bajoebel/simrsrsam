<?php

function getData(
    $config = array(
        'url'           => 'controller/function/',
        'header'        => array('header1', 'header2'),
        'param'         => array('field1' => '', 'field2' => ''),
        'field'         => array('field1', 'field2', '<span>{{ect}}</span>'),
        'start'         => 0,
        'limit'         => 10,
        'row_count'     => 10,
        'keyword_id'    => 'q',
        'limit_id'      => 'limit',
        'data_id'       => 'data',
        'page_id'       => 'pagination',
        'jquery'        => 'assets/bower_components/jquery/dist/jquery.js',
        'number'        => true,
        'action'        => true,
    )
) {
    /**
     * config=array(
     *      'url'           => 'controller/function/',
     *      'header'        => array('header1','header2')
     *      'param'         => array('field1'=>$param1,'field2'=>$param2), //Parameter tambahan
     *      'field'         => array('field1','field2','ect'),  // Field Yang Akan Ditampilkan (Samakan dengan nama Field Yang Ada Di Database)
     *      'start'         => 0,                               // Start Record
     *      'limit'         => 10,                              // Limit data
     *      'row_count'     => $row_count,
     *      'keyword_id'    => 'q',
     *      'limit_id'      => 'limit',
     *      'data_id'       => 'data'
     * );
     */
    //Buat Header
    $html = "";
    if (!empty($config["jquery"])) $html = "<script src='" . base_url() . $config['jquery'] . "'></script>";
    $html = "<thead><tr>";
    if ($config['number'] == true) $html .= "<td>No</td>";
    foreach ($config["header"] as $h) {
        $html .= "<td>$h</td>";
    }
    if ($config['action'] == true) $html .= "<td>#</td>";
    $html .= "</tr></thead>
    <tbody id='" . $config['data_id'] . "'></tbody>
    <tfoot><tr><td colspan='' id='" . $config["page_id"] . "'></td></tr></tfoot>";
    return $html;
    //Buat Body

}
