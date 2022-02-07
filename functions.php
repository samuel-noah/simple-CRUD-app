<?php
//koneksi dengan data base
$conn = mysqli_connect('localhost','root','','cowork');

//mengambil data dari data base 

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        
        $rows[] = $row;
    }
    return $rows;
}

function insert($data){
    global $conn;
    $name = htmlspecialchars($data['nama']);
    $title = htmlspecialchars($data['title']);
    $description = htmlspecialchars($data['descript']);
    $picture = upload();
    $contact = htmlspecialchars($data['contact']);

    //upload picture 
    if(!$picture){
        return false;
    }
    $query = "INSERT INTO project VALUES ('','$name','$title','$description','$picture','$contact')";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}



function upload(){

    $namaFile = $_FILES['picture']['name'];
    $ukuranFile = $_FILES['picture']['size'];
    $error = $_FILES['picture']['error'];
    $tmpName = $_FILES['picture']['tmp_name'];

    if ( $error === 4){
        echo "<script>
                alert('please insert a picture');
             </script>";
        return false;
 
    }

    //cek file 
    $ekstensiFileValid =['jpg','jpeg','png'];
    $ekstensiFile = explode('.',$namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));

    if (!in_array($ekstensiFile,$ekstensiFileValid)){
        echo    "<script>
                alert(file format is not valid')
                </script>";
    
        return false;
    }


    //cek ukuran file 
    if ($ukuranFile > 1000000){
        echo "<script>
                alert('file size exceed');
             </script>";
    }




    //mengenerate nama file baru 
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;

    //upload gambar 
    move_uploaded_file($tmpName,'img/'.$namaFileBaru);
    return $namaFileBaru;
}



function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM project WHERE id = $id " );

    return mysqli_affected_rows($conn);
}


function edit($data){
    global $conn;

    $id = $data["id"];
    $name = htmlspecialchars($data['nama']);
    $title = htmlspecialchars($data['title']);
    $description = htmlspecialchars($data['descript']);
    $contact = htmlspecialchars($data['contact']);
    $gambarLama = htmlspecialchars($data['gambarLama']);
    
    
    //cek jika user memakai gambar baru 
    if ($_FILES['picture']['error']===4){
        $picture = $gambarLama;
    }else{
        
        $picture = upload();
    }
    
    
    $query = "UPDATE project SET


        nama = '$name',
        title = '$title', 
        descript = '$description',
        picture ='$picture',
        contact = '$contact'
        
        WHERE id = $id ";



mysqli_query($conn,$query);
var_dump($query);

    return mysqli_affected_rows($conn);

}

function search($keyword){
    $query = "SELECT * FROM project WHERE nama LIKE '%$keyword%' OR
    title LIKE '%$keyword%'OR
    descript LIKE '%$keyword%' OR 
    contact LIKE '%$keyword%' ";

    return query($query);
}



function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    if ($password !== $password2){
        echo "<script>alert('password tidak sesuai') </script>";
        return false;
        
    }

    //cek apakah username sudah ada 

    $result =  mysqli_query($conn,"SELECT username FROM users WHERE username = '$username' ");


    if (mysqli_fetch_assoc($result)){
        echo "<script
            alert('username sudah terdaftar')
            </script>";
            return false;
    }
    //eknripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user ke database 
    mysqli_query($conn,"INSERT INTO users VALUES ('','$username','$email','$password')");
    
    return mysqli_affected_rows($conn);


    
}


?>