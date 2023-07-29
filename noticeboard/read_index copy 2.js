function gotowrite(){
    location.href = "write.php";
}
function gotologin(){
    location.href = "login.php";
}

function newload(){
  const word = document.getElementById('cur_word').value;
  const option = document.getElementById('option_val').value;
  const fromcal = document.getElementById('fromCal').value;
  const tocal = document.getElementById('toCal').value;
  location.href = 'read_index.php?word='+word+'&option='+option+'&fromCal='+fromcal+'&toCal='+tocal+'&page=1';
}

function load(){
  const word = document.getElementById('cur_word').value;
  const page = document.getElementById('cur_page').value;
  const option = document.getElementById('option_val').value;
  const fromcal = document.getElementById('fromCal').value;
  const tocal = document.getElementById('toCal').value;
  findboard(word, page, option, fromcal, tocal);
  paging(word, page, option, fromcal, tocal);
}
// one page = 10 list, one block = 5 pages
function findboard(word, page, option, fromcal, tocal){  
    // Ajax 요청 보내기
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '/get_read_index.php?request=board&page=' + encodeURIComponent(page) + '&word=' + encodeURIComponent(word) +'&option='+
    encodeURIComponent(option)+'&fromCal='+encodeURIComponent(fromcal)+'&toCal='+encodeURIComponent(tocal));
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
      DATE.textContent = record.created;
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

function paging(word, page, option, fromcal, tocal){
  const xhr = new XMLHttpRequest();
  xhr.open('GET', '/get_read_index.php?request=page&page=' + encodeURIComponent(page)+ '&word=' + encodeURIComponent(word)+'&option='+
  encodeURIComponent(option)+'&fromCal='+encodeURIComponent(fromcal)+'&toCal='+encodeURIComponent(tocal));
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          Updatepage(response, page, word, option, fromcal, tocal);
      }
    };
    xhr.send();
}

function Updatepage(response, current_page, current_word, current_option, current_fromcal, current_tocal){
  const pager = document.getElementById('pager');
  pager.innerHTML = '';
  const {start_page, end_page, last_page} = response.page_info;

  const front_page = (start_page <= 1) ? 1 : start_page-1;
  const back_page = (end_page < last_page) ? end_page + 1 : last_page;

  const previousPage = document.createElement('a');
  previousPage.href = `/read_index.php?word=${current_word}&option=${current_option}&fromCal=${current_fromcal}&toCal=${current_tocal}&page=${front_page}`;
  previousPage.innerText = '<';
  previousPage.style.margin = '5px';
  pager.appendChild(previousPage);

  for (let i = start_page; i <= end_page; i++) {
    const pageLink = document.createElement('a');
    pageLink.href = `/read_index.php?word=${current_word}&option=${current_option}&fromCal=${current_fromcal}&toCal=${current_tocal}&page=${i}`;
    pageLink.innerText = i;
    pageLink.style.margin = '5px';
    if (i === parseInt(current_page)) {
      pageLink.className = 'active';
    }
    pager.appendChild(pageLink);
  }
  const nextPage = document.createElement('a');
  nextPage.href = `/read_index.php?word=${current_word}&option=${current_option}&fromCal=${current_fromcal}&toCal=${current_tocal}&page=${back_page}`;
  nextPage.innerText = '>';
  nextPage.style.margin = '5px';
  pager.appendChild(nextPage);

}

