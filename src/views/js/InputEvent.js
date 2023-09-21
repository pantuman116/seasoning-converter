const seasoningElement = document.querySelector('select#seasoning');
seasoningElement.addEventListener('input', checkInput);

const mainValueElement = document.querySelector('input#mainValue');
mainValueElement.addEventListener('input', checkInput);

const subValueElement = document.querySelector('input#subValue');
subValueElement.addEventListener('input', checkInput);

const mainUnitElement = document.querySelector('select#mainUnit');
mainUnitElement.addEventListener('input', checkInput);

const subUnitElement = document.querySelector('select#subUnit');
subUnitElement.addEventListener('input', checkInput);

function checkInput(e)
{
    if (e.target.value === "") {
        mainValueElement.value = "";
        subValueElement.value = "";
        return;
    }

    if (mainValueElement.value === "" && subValueElement.value === "") {
        return;
    }

    const changeType = e.target.id;
    const seasoning = seasoningElement.value;
    const mainValue = mainValueElement.value;
    const mainUnit = mainUnitElement.value;
    const subValue = subValueElement.value;
    const subUnit = subUnitElement.value;

    //フォーム作成
    const formData = new FormData();
    formData.append('changeType', changeType);
    formData.append('seasoning', seasoning);
    formData.append('mainValue', mainValue);
    formData.append('mainUnit', mainUnit);
    formData.append('subValue', subValue);
    formData.append('subUnit', subUnit)

    //HTTPリクエスト
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/app/controller/InputEvent.php');
    xhr.send(formData);

    //HTTPレスポンス解釈
    xhr.addEventListener('loadend', function (e) {
        const xhr = e.currentTarget;

        if (xhr.status === 200) {
            const response = JSON.parse(xhr.response);
            mainValueElement.value = response['mainValue'];
            subValueElement.value = response['subValue'];
        } else {
            //エラー
            alert('取得失敗');
        }
    })
}
