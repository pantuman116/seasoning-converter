const mainValueElement = document.querySelector('input#mainValue');
const subValueElement = document.querySelector('input#subValue');
mainValueElement.addEventListener('input', checkMainValueInput);

function checkMainValueInput (e)
{
  if(e.target.value === "") {
    subValueElement.value = "";
    return;
  }

  const mainValue = e.target.value;

  //フォーム作成
  const formData = new FormData();
  formData.append('mainValue', mainValue);

  //HTTPリクエスト
  const xhr = new XMLHttpRequest();
  xhr.open('POST', '/app/controller/InputEvent.php');
  xhr.send(formData);

  //HTTPレスポンス解釈
  xhr.addEventListener('loadend', function(e){
    const xhr = e.currentTarget;

    if (xhr.status === 200) {
      const response = JSON.parse(xhr.response);
      subValueElement.value = response['subValue'];
    } else {
      //エラー
      alert('取得失敗');
    }
  })
}
