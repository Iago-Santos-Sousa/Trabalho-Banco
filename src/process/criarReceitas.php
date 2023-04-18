<?php
    // session_start();

    include_once("./conn.php");



    $stmt = $conn->query("SELECT * FROM livro_receita.receita;");

    $result = $stmt->fetchAll();

    // var_dump($result);

    foreach($result as $k=>$v) {
        echo $v['nome_receita'];
    }



//    try {

//         $stmt = $conn->prepare("SELECT * FROM receita WHERE id >= :id");

//         $num = 1;

//     //    $stmt->execute([":id" >= 1]);

//         $stmt->bindParam('id', $num);
//        $stmt->execute();
//        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     //    var_dump($result);

//     // print_r($result);

  
      
//     foreach($result as $k=>$v) {
//         // echo $v['descricao'];
//         // var_dump($k);
//         // echo $v['descricao']."<br>";
//         echo "Receita $k tem nome de: " . $v['nome_receita'] . "<br>";
//     }
        
     
//         echo "<br>";
//         echo "<br>";
//         echo "Query feita com sucesso!";
//    } catch (PDOException $e) {
//         echo $e->getMessage();
//    }



    // $conn = null;







?>