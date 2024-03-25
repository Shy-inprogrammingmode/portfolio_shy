    <?php
    try {
        $DSN = 'mysql:host=localhost;dbname=shy_cms'; 
        $Conn = new PDO($DSN, 'root', ''); 
        $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
