<?php

// Hàm kết nối dữ liệu
function db_connect()
{
    global $conn;
    $db = func_get_arg(0);
    $servername = $db['hostname'];
    $username = $db['username'];
    $password = $db['password'];
    $database =  $db['database'];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// Lấy một dòng trong CSDL
function db_fetch_row($query_string)
{
    global $conn;
    try {
        $stmt = $conn->prepare($query_string);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    }
}

//Lấy một mảng trong CSDL
function db_fetch_array($query_string)
{
    global $conn;
    try {
        $stmt = $conn->prepare($query_string);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    }
}
//Lấy số bản ghi
function db_num_rows($query_string)
{
    global $conn;
    try {
        $stmt = $conn->prepare($query_string);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    } catch (PDOException $e) {
        throw $e;
    }
}
// Insert
function db_insert($table, $data)
{
    global $conn;
    $fields = implode(", ", array_keys($data));
    $placeholders = implode(", :", array_keys($data));
    $sql = "INSERT INTO `$table` ($fields) VALUES (:$placeholders)";
    $stmt = $conn->prepare($sql);
    // Gắn giá trị từ mảng $data vào tham số bằng bindParam
    foreach ($data as $field => &$value) {
        $stmt->bindParam(":$field", $value);
    }
    $stmt->execute();
    if ($stmt)
        return true;
    return false;
}
// Update
function db_update($table, $data, $where)
{
    global $conn; // Đảm bảo biến $conn đã được khởi tạo

    $updateFields = array();
    $params = array();

    foreach ($data as $field => $value) {
        if ($value === NULL) {
            $updateFields[] = "$field = NULL";
        } else {
            $updateFields[] = "$field = :$field";
            $params[":$field"] = &$data[$field];
        }
    }

    $updateFieldsStr = implode(', ', $updateFields);

    $sql = "UPDATE $table SET $updateFieldsStr WHERE $where";
    $stmt = $conn->prepare($sql);

    foreach ($params as $param => &$value) {
        $stmt->bindParam($param, $value);
    }

    $stmt->execute();
    if ($stmt)
        return true;
    return false;
}

function db_delete($table, $where)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE $where";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
