

// BENTOの説明
$('bg-image').hover(function () {
        $('.caption', this).animate({
            top: "75px"
        }, 500);
    }, function () {
        $('.caption', this).animate({
            top: "150px"
        }, 500);
});

$('.bg-image').hover(function() {
    $("#mean").slideDown(2000);
});

// 記録メモ
$("#btn1").on("click",function(){
        　$("#form").slideToggle(300);
    
});

function previewFile(file) {
    // プレビュー画像を追加する要素
    const preview = document.getElementById('preview');
  
    // FileReaderオブジェクトを作成
    const reader = new FileReader();
  
    // ファイルが読み込まれたときに実行する
    reader.onload = function (e) {
      const imageUrl = e.target.result; // 画像のURLはevent.target.resultで呼び出せる
      const img = document.createElement("img"); // img要素を作成
      img.src = imageUrl; // 画像のURLをimg要素にセット
      preview.appendChild(img); // #previewの中に追加
    }
  
    // いざファイルを読み込む
    reader.readAsDataURL(file);
  }
  
  
  // <input>でファイルが選択されたときの処理
  const fileInput = document.getElementById('upfile');
  const handleFileSelect = () => {
    const files = fileInput.files;
    for (let i = 0; i < files.length; i++) {
      previewFile(files[i]);
    }
  }
  fileInput.addEventListener('change', handleFileSelect);



$("#save").on("click",function(){
const value = $("#textarea").val(); 
 localStorage.setItem("record" , value);
 alert("DONE!");
});




// $("#icon0").on("click",function(){
//      let count = 0
//      return function() {
//       count++
//       if (count === 1) {
//          $("icon1").remove()// 1回目の処理を書く
//       } else if (count === 2) {
//          $("icon2").remove()// 2回目の処理を書く
//       } else if (count === 3) {
//          $("icon3").remove()// 3回目の処理を書く
//       } else if (count === 4) {
//          $("icon4").remove()// 4回目の処理を書く
//       } else if (count === 5) {
//          $("icon5").remove()// 5回目の処理を書く
//          console.log("ok");
//     } 
// }      
// })


// $(function() { 
//     var count = 0;
//     $("#icon0").on("click",function(){
//         return function() {

//         count=count+1
//         if (count === 1) {
//             $("icon1").remove()// 1回目の処理を書く
//          } else if (count === 2) {
//             $("icon2").remove()// 2回目の処理を書く
//          } else if (count === 3) {
//             $("icon3").remove()// 3回目の処理を書く
//          } else if (count === 4) {
//             $("icon4").remove()// 4回目の処理を書く
//          } else if (count === 5) {
//             $("icon5").remove()// 5回目の処理を書く
//             console.log("ok");
//         }
//     }
//     })
//     })


