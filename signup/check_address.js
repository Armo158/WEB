
function handleInput() {
        const address = document.getElementById('address').value;
        const query = `SELECT * FROM ZIPCODE WHERE DORO LIKE '%${address}%' LIMIT 5`;
        
        // Ajax 요청 보내기
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/get_address.php?query=' + encodeURIComponent(query));
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            
            // 응답 데이터 처리하기
            updateUI(response);
          }
        };
        xhr.send();
}

function updateUI(response) {
    const tableBodyElement = document.getElementById('result');
    tableBodyElement.innerHTML = ''; // 테이블 본문 요소 초기화
  
    for (const record of response) {
      const rowElement = document.createElement('tr'); // 새로운 tr 요소 생성
      const ZIPNO = document.createElement('td'); // 새로운 td 요소 생성
      const DORO = document.createElement('td');
      ZIPNO.textContent = record.ZIP_NO; // td 요소에 데이터 설정
      DORO.textContent = recodr.SIDO + record.DORO;
      rowElement.appendChild(ZIPNO); // td 요소를 tr 요소에 추가
      rowElement.appendChild(DORO);
      tableBodyElement.appendChild(rowElement); // tr 요소를 테이블 본문 요소에 추가
      DORO.addEventListener('click', function(){
        window.opener.Document.getElementById('Roadaddr').value = DORO;
        window.opener.Document.getElementById('Decide_Roadaddr').value = DORO;
        window.opener.Document.getElementById('Roadaddr').disabled = true;
        window.close();
      })
    }
  }