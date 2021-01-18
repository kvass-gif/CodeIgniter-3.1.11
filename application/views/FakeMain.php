<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
   .btn {
    display: inline-block; 
    background: #8C959D; 
    color: #fff; 
    padding: 1rem 1.5rem;
    text-decoration: none; 
    border-radius: 3px;
   }

   .block{
	   width: 200px;
	   display: inline-block;
   }

   
  </style>
</head>
<body>

	
		<h2>Введіть кількість даних для генерації по кожній таблиці окремо</h2>

		<p><div class = "block">Автори:</div> <input  type="number" value = 0 id = 'authors'></p>
		<p><div class = "block">Категорії:  </div>       <input type="number" value = 0 id = 'categories'></p>
		<p><div class = "block">Коментарі:  </div>       <input type="number" value = 0 id = 'comments'></p>
		<p><div class = "block">Пости:     </div>        <input type="number" value = 0 id = 'posts'></p>
		<p><div class = "block">Лайки до постів: </div>  <input type="number" value = 0 id = 'post_likes'></p>
		<p><div class = "block">Фотографії постів:</div> <input type="number" value = 0 id = 'post_photos'></p>


		<input value="Генерувати" onclick="sendlink()" type="button">

		<script>

   			function sendlink(){

				var arr = [];
				arr[0] = document.getElementById('authors').value;
				arr[1] = document.getElementById('categories').value;
				arr[2] = document.getElementById('comments').value;
				arr[3] = document.getElementById('posts').value;
				arr[4] = document.getElementById('post_likes').value;
				arr[5] = document.getElementById('post_photos').value;

				document.location.href = `http://localhost/php/CodeIgniter/CodeIgniter-3.1.11/FakerController/generateFakeDataToDatabase/${arr.join('/')}`;

			}
		
		</script>
   		
 </body>
</html>




</body>
</html>