<?php
session_start();
date_default_timezone_set("Asia/Taipei");

// 名DB==內容與資料庫有關
class DB{
    // protected==用於不被看到該內容
   protected $table;
   protected $dsn='mysql:host=localhost;charset=utf8;dbname=db03';
   protected $pdo;

    // 為了讓其好用 建立一個function
   function __construct($table)
   {    
    // 讓這個東西就是該資料表
        $this->table=$table; // 當table是資料表的table時
        $this->pdo=new PDO($this->dsn,'root',''); // 若是字串等 不需要連資料庫的 就不需要該動作
   }

/*
    1. 新增資料 insert() into table
    2. 修改資料 update() into table
    把1+2=save()  若有 就修改, 若無 就新增

    3. 查詢資料 all(),find() 查多筆 查單筆 select from table
    4. 篩除資料 del() delete from table
    5. 計算 max(),min(),sum(),count(),avg() 有很多功能 所以整合成 math() selcet max() from table
*/ 


// 以下幾項為條件的設置
// ($array)             // 特定欄位條件的多筆資料
// ($array,$sql)        // 有欄位條件又有額外條件的多筆資料....如where ...limit...  ,  where...order by...
// ()                   // 不帶任何參數==整張資料表的內容
// ($sql)               // 只有額外條件的多筆資料 ...limit $start  /  $div...  /  order by...  /  group by...

// 用於查詢 ,不確定會放幾個參數 就用...變數  ,如果確定只有一個參數  就放一個變數名稱
   function all(...$arg){
        $sql="select * from $this->table ";
        // 若第一個參數存在的話 , 如果第一個參數不存在==整張資料表==select * from `table`
        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach($arg[0] as $key => $val){
                    $tmp[]="`$key`='$val'"; // 有幾個值 放幾個字串進去
                }
                //$sql = $sql . " where " . join(" && ",$tmp); // 丟進來的東西全部滿足 材加上&& 撈出資料 用陣列 串成字串 變成一個完整的sql語法 然後丟出去 完成一個sql內容
                $sql .= " where " . join(" && ",$tmp);
            }else{
                // $sql=$sql . $arg[0];
                $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        // echo $sql; // 用於檢查base檔有無錯誤 echo出來看少了什麼
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
   }
   function find($arg){
    $sql="select * from $this->table where";
    
        if(is_array($arg)){
            foreach($arg as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            //$sql = $sql . " where " . join(" && ",$tmp);
            $sql .=  join(" && ",$tmp);
        }else{
            // $sql=$sql . $arg[0];
            $sql .= " `id`='$arg'";
        }
   

    //echo $sql;
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
   }

   function save($array){
        if(isset($array['id'])){
            //更新
            foreach($array as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            
            $sql="update $this->table set  ".join(',',$tmp)."  where `id`='{$array['id']}'";
        }else{
            $sql="insert into $this->table (`".join("`,`",array_keys($array))."`) 
                                     values('".join("','",$array)."')";
        }

        return $this->pdo->exec($sql);
   }

   function del($arg){
    $sql="delete from $this->table where";
    
        if(is_array($arg)){
            foreach($arg as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            //$sql = $sql . " where " . join(" && ",$tmp);
            $sql .=  join(" && ",$tmp);
        }else{
            // $sql=$sql . $arg[0];
            $sql .= " `id`='$arg'";
        }
   

    //echo $sql;
    return $this->pdo->exec($sql);
   }
   function math($math,$col,...$arg){
    $sql="select $math($col) from $this->table ";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            foreach($arg[0] as $key => $val){
                $tmp[]="`$key`='$val'";
            }
            //$sql = $sql . " where " . join(" && ",$tmp);
            $sql .= " where " . join(" && ",$tmp);
        }else{
            // $sql=$sql . $arg[0];
            $sql .= $arg[0];
        }
    }

    if(isset($arg[1])){
        $sql .= $arg[1];
    }

    //echo $sql;
    return $this->pdo->query($sql)->fetchColumn();
   }
   function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
   }

}


function dd($array){
echo "<pre>";

print_r($array);
echo "</pre>";
}

function to($url){
    header('location:'.$url);
}

$Total=new DB('total');





?>