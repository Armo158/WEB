function gotowrite(){
    location.href = "write.php";
}
function gotologin(){
    location.href = "login.php";
}


function findboard(){
        const word = document.getElementById('word').value;
        const query = `SELECT bid, id, title, created, hit FROM board WHERE title LIKE '%${word}%' ORDER BY bid DESC LIMIT 0,10`;
        
        // Ajax 요청 보내기
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/get_read_index.php?query=' + encodeURIComponent(query));
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            
            // 응답 데이터 처리하기
            updateUI(response);
          }
        };
        xhr.send();
}

function updateUI(response){
    const tableBodyElement = document.getElementById('result');
    tableBodyElement.innerHTML = ''; // 테이블 본문 요소 초기화
  
    for (const record of response) {
      const rowElement = document.createElement('tr'); // 새로운 tr 요소 생성
      const BID = document.createElement('td'); 
      const ID = document.createElement('td');
      const TITLE = document.createElement('td');
      const DATE = document.createElement('td');
      const HIT = document.createElement('td');
      BID.textContent = record.bid;
      ID.textContent = record.id;
      TITLE.textContent = record.title;
      DATE.textContent = record.date;
      HIT.textContent = record.hit;// td 요소에 데이터 설정
      rowElement.appendChild(BID); 
      rowElement.appendChild(TITLE);
      rowElement.appendChild(ID);
      rowElement.appendChild(DATE);
      rowElement.appendChild(HIT);// td 요소를 tr 요소에 추가;
      tableBodyElement.appendChild(rowElement); // tr 요소를 테이블 본문 요소에 추가
      TITLE.addEventListener('click', function(){
            location.href = "read.php?bid=" + record.bid;
      })
    }
}