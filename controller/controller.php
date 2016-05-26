<?php
if (null !== filter_input(INPUT_POST, 'module') && null !== filter_input(INPUT_POST, 'data'))
{
    $key = "e10adc3949ba59abbe56e057f20f883e";
    $data = filter_input(INPUT_POST, 'data', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $userData = $data;
    $modeule = filter_input(INPUT_POST, 'module');
    $data['key'] = $key;
    $hash = md5(implode("", $data));
    $url = "http://127.0.0.1/SaaSBase/$modeule";
    $fields = array(
        'data' => urlencode(json_encode($userData)),
        'hash' => urlencode($hash),
    );
    $fields_string = null;
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    $result = curl_exec($ch);
    curl_close($ch);
}