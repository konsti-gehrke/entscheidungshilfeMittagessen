<?php


/* Escaping characters to prepare for sql insert*/
function clean_str($str): string
{
    return str_replace("'", "\'", $str);
}

function load_xml_file($mysqlConnection, $csv_path)
{
    // for testing, we drop table and create it new
    $drop_query = "DROP TABLE IF EXISTS essen";
    mysqli_query($mysqlConnection, $drop_query);

    $add_query = "CREATE TABLE IF NOT EXISTS essen (
    name VARCHAR(100) NOT NULL,
    entfernung VARCHAR(20) NOT NULL,
    preis VARCHAR(20) NOT NULL,
    veggie VARCHAR(20) NOT NULL,
    adresse VARCHAR(100) NOT NULL,
    kategorie VARCHAR(40) NOT NULL,
    PRIMARY KEY (name, adresse)
)";
    mysqli_query($mysqlConnection, $add_query);

    $lines = file($csv_path);
    array_shift($lines);
    foreach ($lines as $value)
    {
        $csv = str_getcsv(clean_str($value), ';');
        $insert_query = "INSERT INTO essen (name, entfernung, preis, veggie, adresse, kategorie)
            VALUES ('"
            . $csv[0] . "', '" . $csv[1] . "', '"
            . $csv[2] . "', '" . $csv[3] . "', '"
            . $csv[4] . "', '" . $csv[5] . "')";
        mysqli_query($mysqlConnection, $insert_query);
    }


}