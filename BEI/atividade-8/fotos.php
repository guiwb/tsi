<?php
function salvaFoto($id, $pdo, $tabela) {
    if ($_FILES["foto"]["size"] == 0) return null;

    $foto = $_FILES["foto"];

    $extensao = pathinfo($foto["name"], PATHINFO_EXTENSION);
    $nome_foto = $tabela."_".$id.".".$extensao;

    if (!move_uploaded_file($foto["tmp_name"], "./fotos/$nome_foto")) {
        echo "<script>alert('Erro ao fazer upload da foto!".$_FILES['foto']['error']."');</script>";
    }

    $stmt = $pdo->prepare("UPDATE $tabela SET foto = :foto WHERE id = :id");
    $stmt->execute([
        ':foto' => $nome_foto,
        ':id' => $id
    ]);
}

function pegaFoto($foto, $width = 300) {
    if ($foto && file_exists("./fotos/$foto")) {
        return "<img src='./fotos/$foto' width='$width px' alt='Foto de perfil'>";
    }

    return "<img src='./fotos-privadas/sem-foto.jpg' width='$width px' alt='Foto de perfil'>";
}
