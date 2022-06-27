<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.0.1"> </script>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet@1.0.0"> </script>

<input type="file" name="" value="" id="input" onchange="">
<img id="img" style="width:250px; height:250px"></img>

<span id='classify'> </span>

<script>
  const img = document.getElementById('img');
  // Load the model.

  $("input[type=file]").on('change',function(){

  img.src = URL.createObjectURL(event.target.files[0]);
  mobilenet.load().then(model => {
    // Classify the image.
    model.classify(img).then(predictions => {
      console.log('Predictions: ');
      console.log(predictions[0]);
      document.getElementById('classify').innerHTML = JSON.stringify(predictions[0]['className']);
    });
  });
});
</script>
