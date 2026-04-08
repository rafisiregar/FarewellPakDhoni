
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <title>Tebak Wajah Pahlawan · Puzzle Challenge | HD Edition</title>
  <style>
    * {
      user-select: none;
      -webkit-tap-highlight-color: transparent;
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    @import url('https://fonts.googleapis.com/css2?family=Bangers&family=Nunito:wght@400;700;900&display=swap');

    body {
      margin: 0;
      min-height: 100vh;
      background: linear-gradient(145deg, #0a0f2a 0%, #0a1628 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Nunito', sans-serif;
      padding: 20px;
    }

    /* layout lebih lebar untuk laptop */
    #tebak-root {
      width: 100%;
      max-width: 1280px;        /* lebih lebar untuk laptop */
      margin: 0 auto;
      background: rgba(10, 22, 40, 0.95);
      border-radius: 56px;
      overflow: hidden;
      position: relative;
      box-shadow: 0 30px 50px rgba(0, 0, 0, 0.6), 0 0 0 2px rgba(255, 200, 100, 0.15);
    }

    .ray-bg {
      position: absolute;
      inset: 0;
      background: radial-gradient(ellipse at 30% 40%, #1a3a6e 0%, #0a1628 90%);
      z-index: 0;
    }

    .rays {
      position: absolute;
      inset: 0;
      background-image: repeating-conic-gradient(#1e4080 0deg 5deg, transparent 5deg 10deg);
      opacity: 0.15;
      z-index: 0;
    }

    .screen {
      position: relative;
      z-index: 2;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 28px 32px 40px;
      min-height: 680px;
    }

    /* START SCREEN */
    .start-screen {
      text-align: center;
      width: 100%;
      animation: fadeIn 0.4s ease;
    }
    
    .start-screen h1 {
      font-family: 'Bangers', cursive;
      font-size: 68px;
      color: #fff;
      letter-spacing: 4px;
      margin: 0 0 10px;
      text-shadow: 4px 4px 0 #e63946;
    }

    .start-screen p {
      color: #b8d4ff;
      font-size: 18px;
      margin: 0 0 30px;
      font-weight: 600;
    }

    .btn-start {
      background: linear-gradient(135deg, #1e90ff, #0066cc);
      color: #fff;
      border: none;
      border-radius: 80px;
      padding: 18px 58px;
      font-family: 'Bangers', cursive;
      font-size: 38px;
      letter-spacing: 2px;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 12px;
      box-shadow: 0 8px 0 #0a4d8a;
      transition: transform 0.08s linear, box-shadow 0.08s linear;
    }

    .btn-start:active {
      transform: translateY(4px);
      box-shadow: 0 4px 0 #0a4d8a;
    }

    .info-text {
      color: #8aacdd;
      font-size: 15px;
      margin-top: 32px;
      text-align: center;
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
      background: #0a122e80;
      padding: 12px 20px;
      border-radius: 60px;
      backdrop-filter: blur(2px);
    }

    /* PUZZLE LAYOUT */
    .puzzle-header {
      width: 100%;
      max-width: 750px;
      display: flex;
      justify-content: space-between;
      align-items: baseline;
      margin-bottom: 20px;
      gap: 20px;
    }

    .timer {
      background: #0b1b38;
      padding: 8px 24px;
      border-radius: 60px;
      color: #f5c842;
      font-size: 32px;
      font-weight: 900;
      font-family: monospace;
      letter-spacing: 2px;
      box-shadow: inset 0 1px 4px #00000055, 0 3px 6px rgba(0,0,0,0.4);
    }

    .score {
      background: #0b1b38;
      padding: 8px 28px;
      border-radius: 60px;
      color: #fff;
      font-size: 26px;
      font-weight: 800;
      box-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }

    .question-label {
      font-family: 'Bangers', cursive;
      color: #fff;
      font-size: 32px;
      letter-spacing: 2px;
      margin-bottom: 20px;
      text-align: center;
      background: #00000088;
      padding: 10px 32px;
      border-radius: 60px;
      display: inline-block;
      backdrop-filter: blur(4px);
    }

    .tile-grid-wrap {
      background: #070f22;
      border-radius: 32px;
      padding: 16px;
      box-shadow: inset 0 2px 8px rgba(0,0,0,0.6), 0 12px 24px rgba(0,0,0,0.4);
    }

    .tile-grid {
      display: grid;
      gap: 2px;
      background: #0f1e3a;
      margin: 0 auto;
    }

    .tile {
      position: relative;
      overflow: hidden;
      border-radius: 8px;
      background: #152a4e;
      cursor: pointer;
    }

    .tile .cover {
      position: absolute;
      inset: 0;
      background: linear-gradient(145deg, #1f3d6e, #152a50);
      border: 1px solid rgba(255, 215, 100, 0.2);
      transition: opacity 0.25s ease-out;
      border-radius: 8px;
      backdrop-filter: brightness(0.9);
      z-index: 2;
    }

    .tile img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .progress-label {
      color: #cae3ff;
      font-size: 16px;
      font-weight: bold;
      margin-top: 18px;
      background: #07132bcc;
      padding: 10px 24px;
      border-radius: 50px;
      text-align: center;
      backdrop-filter: blur(2px);
    }

    /* ACTION PANEL */
    .action-panel {
      display: flex;
      gap: 28px;
      align-items: center;
      justify-content: center;
      margin: 24px 0 16px;
      flex-wrap: wrap;
    }

    .stop-puzzle-btn, .resume-puzzle-btn, .buzz-btn {
      border: none;
      border-radius: 60px;
      padding: 14px 38px;
      font-family: 'Bangers', cursive;
      font-size: 26px;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.08s linear;
      min-width: 190px;
      justify-content: center;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .stop-puzzle-btn {
      background: #f4a261;
      color: #2d1b00;
      box-shadow: 0 6px 0 #b95f1a;
    }
    .stop-puzzle-btn:active { transform: translateY(3px); box-shadow: 0 3px 0 #b95f1a; }

    .resume-puzzle-btn {
      background: #2ecc71;
      color: #0a2f1a;
      box-shadow: 0 6px 0 #1f8a4c;
    }
    .resume-puzzle-btn:active { transform: translateY(3px); box-shadow: 0 3px 0 #1f8a4c; }

    .buzz-btn {
      background: #e63946;
      color: white;
      box-shadow: 0 6px 0 #8b0000;
    }
    .buzz-btn:active { transform: translateY(3px); box-shadow: 0 3px 0 #8b0000; }

    .disabled {
      opacity: 0.5;
      transform: none;
      pointer-events: none;
    }

    /* HALAMAN PILIHAN JAWABAN (A, B, C) - LEBIH LEBAR & GAMBAR BESAR */
    .choices-page {
      width: 100%;
      animation: fadeSlide 0.3s ease;
    }

    .choices-header {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 24px;
      padding: 0 12px;
    }

    .back-hint {
      background: #0e1f3e;
      padding: 10px 28px;
      border-radius: 60px;
      color: #ffd966;
      font-size: 20px;
      font-weight: bold;
    }

    .question-text {
      font-family: 'Bangers', cursive;
      font-size: 40px;
      color: #fff;
      background: #000000aa;
      display: inline-block;
      padding: 12px 32px;
      border-radius: 60px;
      margin-bottom: 24px;
      text-align: center;
    }

    .choices-grid {
      display: flex;
      gap: 40px;
      flex-wrap: wrap;
      justify-content: center;
      margin: 30px 0 30px;
      width: 100%;
    }

    /* GAMBAR PADA PILIHAN JADI LEBIH BESAR */
    .choice-card {
      background: #0e1f3e;
      border: 3px solid #f5c842;
      border-radius: 48px;
      cursor: pointer;
      padding: 28px 20px 24px;
      min-width: 260px;
      flex: 1;
      max-width: 310px;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 18px;
      transition: transform 0.1s, background 0.2s;
      box-shadow: 0 20px 30px black;
    }

    .choice-card:active {
      transform: scale(0.97);
    }

    .choice-card.correct-feedback {
      background: #1a6e2e;
      border-color: #a0ffb0;
      box-shadow: 0 0 24px #4ef06a;
    }

    .choice-card.wrong-feedback {
      background: #6e1a1a;
      border-color: #ff7b7b;
    }

    .choice-letter {
      font-family: 'Bangers', cursive;
      font-size: 44px;
      color: #f5c842;
      background: #00000077;
      width: 70px;
      border-radius: 50px;
      text-align: center;
    }

    /* ukuran gambar lebih besar */
    .choice-card img {
      width: 210px;
      height: 190px;
      object-fit: cover;
      border-radius: 32px;
      border: 3px solid #ffd966;
      box-shadow: 0 8px 12px rgba(0,0,0,0.5);
    }

    .choice-name {
      color: white;
      font-size: 18px;
      font-weight: 900;
      background: #000000bb;
      padding: 10px 18px;
      border-radius: 60px;
      width: 100%;
      text-align: center;
    }

    /* Tombol LANJUT KE PERTANYAAN - baru */
    .next-question-btn {
      background: linear-gradient(135deg, #f5b042, #e07c1f);
      border: none;
      border-radius: 80px;
      padding: 14px 44px;
      font-family: 'Bangers', cursive;
      font-size: 30px;
      letter-spacing: 2px;
      color: #281a00;
      display: inline-flex;
      align-items: center;
      gap: 14px;
      cursor: pointer;
      box-shadow: 0 7px 0 #9b4a0e;
      transition: all 0.08s linear;
      margin-top: 15px;
    }

    .next-question-btn:active {
      transform: translateY(3px);
      box-shadow: 0 4px 0 #9b4a0e;
    }

    .next-info {
      background: #071b3b;
      padding: 12px 28px;
      border-radius: 60px;
      color: #d4e6ff;
      font-weight: bold;
      font-size: 18px;
      margin-top: 12px;
    }

    /* RESULT */
    .result-screen {
      text-align: center;
      padding: 20px;
    }

    .result-screen h2 {
      font-family: 'Bangers', cursive;
      color: #f5c842;
      font-size: 62px;
      letter-spacing: 2px;
      margin: 12px 0;
    }

    .final-score {
      color: #fff;
      font-size: 44px;
      font-weight: 900;
      margin-bottom: 24px;
    }

    .btn-restart {
      background: #1e90ff;
      border: none;
      padding: 16px 54px;
      font-family: 'Bangers', cursive;
      font-size: 36px;
      border-radius: 60px;
      cursor: pointer;
      color: white;
      box-shadow: 0 7px 0 #0a5db5;
      transition: 0.08s linear;
    }

    .btn-restart:active {
      transform: translateY(3px);
      box-shadow: 0 3px 0 #0a5db5;
    }

    .trophy {
      font-size: 95px;
      margin-bottom: 10px;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.98); }
      to { opacity: 1; transform: scale(1); }
    }

    @keyframes fadeSlide {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* responsif laptop tetap ok */
    @media (max-width: 900px) {
      .screen { padding: 22px 20px 30px; }
      .choice-card { min-width: 210px; max-width: 270px; }
      .choice-card img { width: 170px; height: 160px; }
      .question-text { font-size: 30px; }
      .next-question-btn { font-size: 26px; padding: 10px 36px; }
      .stop-puzzle-btn, .resume-puzzle-btn, .buzz-btn { font-size: 22px; padding: 10px 24px; min-width: 160px; }
    }
  </style>
</head>
<body>
<div id="tebak-root">
  <div class="ray-bg"></div>
  <div class="rays"></div>
  <div class="screen" id="app"></div>
</div>

<script>
  (function() {
    // ========== DATA PERTANYAAN (4 Soal Pahlawan) ==========
    const QUESTIONS = [
      {
  answer: "Ir. Soekarno",
  img: "images/soekarno.jpeg",
  choices: [
    { name: "Ir. Soekarno", img: "images/soekarno.jpeg" },
    { name: "Moh. Hatta", img: "images/soekarno.jpeg" },
    { name: "Soeharto", img: "images/soekarno.jpeg" }
  ]
},
      {
        answer: "Moh. Hatta",
        img: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Mohammad_Hatta.jpg/440px-Mohammad_Hatta.jpg",
        choices: [
          { name: "Ir. Soekarno", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/COLLECTIE_TROPENMUSEUM_Portretfoto_van_Soekarno_TMnr_10018503.jpg/440px-COLLECTIE_TROPENMUSEUM_Portretfoto_van_Soekarno_TMnr_10018503.jpg" },
          { name: "Moh. Hatta", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Mohammad_Hatta.jpg/440px-Mohammad_Hatta.jpg" },
          { name: "B.J. Habibie", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Habibie_Bacharuddin_Jusuf.jpg/440px-Habibie_Bacharuddin_Jusuf.jpg" }
        ]
      },
      {
        answer: "Soeharto",
        img: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Soeharto%2C_1993.jpg/440px-Soeharto%2C_1993.jpg",
        choices: [
          { name: "Soeharto", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Soeharto%2C_1993.jpg/440px-Soeharto%2C_1993.jpg" },
          { name: "B.J. Habibie", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Habibie_Bacharuddin_Jusuf.jpg/440px-Habibie_Bacharuddin_Jusuf.jpg" },
          { name: "Moh. Hatta", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Mohammad_Hatta.jpg/440px-Mohammad_Hatta.jpg" }
        ]
      },
      {
        answer: "B.J. Habibie",
        img: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Habibie_Bacharuddin_Jusuf.jpg/440px-Habibie_Bacharuddin_Jusuf.jpg",
        choices: [
          { name: "Ir. Soekarno", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/COLLECTIE_TROPENMUSEUM_Portretfoto_van_Soekarno_TMnr_10018503.jpg/440px-COLLECTIE_TROPENMUSEUM_Portretfoto_van_Soekarno_TMnr_10018503.jpg" },
          { name: "B.J. Habibie", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Habibie_Bacharuddin_Jusuf.jpg/440px-Habibie_Bacharuddin_Jusuf.jpg" },
          { name: "Soeharto", img: "https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Soeharto%2C_1993.jpg/440px-Soeharto%2C_1993.jpg" }
        ]
      }
    ];

    // KONFIGURASI PUZZLE
    const COLS = 8;
    const ROWS = 6;
    const TOTAL_TILES = COLS * ROWS;
    const REVEAL_INTERVAL_MS = 550;
    const MAX_TIME = 30;

    // STATE GLOBAL
    let currentMode = 'start';     // 'start', 'puzzle', 'choices', 'result'
    let currentQIndex = 0;
    let totalScore = 0;
    
    // State puzzle
    let puzzleInterval = null;
    let timerInterval = null;
    let timeLeft = MAX_TIME;
    let isPaused = false;
    let currentRevealStep = 0;
    let tileOrder = [];
    let currentQuestionObj = null;
    let allTilesRevealed = false;
    // Flag untuk menunggu setelah menjawab (agar tidak double next)
    let waitingForNext = false;
    
    const appContainer = document.getElementById('app');

    // Helper
    function shuffleArray(arr) {
      for (let i = arr.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [arr[i], arr[j]] = [arr[j], arr[i]];
      }
      return arr;
    }

    function stopAllPuzzleTimers() {
      if (puzzleInterval) { clearInterval(puzzleInterval); puzzleInterval = null; }
      if (timerInterval) { clearInterval(timerInterval); timerInterval = null; }
    }

    function forceRevealAllTiles() {
      for (let i = 0; i < TOTAL_TILES; i++) {
        const cover = document.getElementById(`puzzle-cover-${i}`);
        if (cover) cover.style.opacity = '0';
      }
    }

    function resumePuzzle() {
      if (currentMode !== 'puzzle' || !isPaused) return;
      isPaused = false;
      if (!allTilesRevealed && currentRevealStep < tileOrder.length) {
        puzzleInterval = setInterval(() => {
          if (currentMode !== 'puzzle' || isPaused) return;
          if (currentRevealStep >= tileOrder.length) {
            clearInterval(puzzleInterval);
            puzzleInterval = null;
            allTilesRevealed = true;
            if (!isPaused && currentMode === 'puzzle') {
              goToChoicesPage("puzzle_completed");
            }
            return;
          }
          const tileIndex = tileOrder[currentRevealStep];
          const coverEl = document.getElementById(`puzzle-cover-${tileIndex}`);
          if (coverEl) coverEl.style.opacity = '0';
          currentRevealStep++;
        }, REVEAL_INTERVAL_MS);
      }
      if (timeLeft > 0 && !timerInterval) {
        timerInterval = setInterval(() => {
          if (currentMode !== 'puzzle' || isPaused) return;
          if (timeLeft <= 1) {
            clearInterval(timerInterval);
            timerInterval = null;
            if (!isPaused && currentMode === 'puzzle') {
              if (puzzleInterval) clearInterval(puzzleInterval);
              puzzleInterval = null;
              forceRevealAllTiles();
              goToChoicesPage("timeout");
            }
            return;
          }
          timeLeft--;
          const timerSpan = document.getElementById('puzzle-timer');
          if (timerSpan) {
            const mins = Math.floor(timeLeft / 60);
            const secs = timeLeft % 60;
            timerSpan.innerText = `${mins}:${secs < 10 ? '0' : ''}${secs}`;
          }
        }, 1000);
      }
      updatePuzzleButtonsUI();
    }

    function pausePuzzle() {
      if (currentMode !== 'puzzle' || isPaused) return;
      isPaused = true;
      stopAllPuzzleTimers();
      updatePuzzleButtonsUI();
      const progLabel = document.getElementById('puzzle-progress');
      if (progLabel) progLabel.innerText = '⏸️ PUZZLE DIHENTIKAN • Tekan LANJUT untuk melanjutkan';
    }

    function buzzToChoices() {
      if (currentMode !== 'puzzle') return;
      if (isPaused) return;
      stopAllPuzzleTimers();
      forceRevealAllTiles();
      goToChoicesPage("buzz");
    }

    function updatePuzzleButtonsUI() {
      const stopBtn = document.getElementById('stopActionBtn');
      const resumeBtn = document.getElementById('resumeActionBtn');
      const buzzBtn = document.getElementById('buzzActionBtn');
      if (!stopBtn || !resumeBtn || !buzzBtn) return;
      if (isPaused) {
        stopBtn.style.display = 'none';
        resumeBtn.style.display = 'flex';
        buzzBtn.disabled = false;
        buzzBtn.classList.remove('disabled');
      } else {
        stopBtn.style.display = 'flex';
        resumeBtn.style.display = 'none';
        buzzBtn.disabled = false;
        buzzBtn.classList.remove('disabled');
      }
    }

    // Fungsi untuk berpindah ke pertanyaan berikutnya (tombol LANJUT)
    function nextQuestion() {
      if (waitingForNext) return;
      if (currentMode !== 'choices') return;
      waitingForNext = true;
      // Pindah ke soal berikutnya atau hasil akhir
      currentQIndex++;
      if (currentQIndex >= QUESTIONS.length) {
        renderResultScreen();
      } else {
        renderPuzzleScreen();
      }
      waitingForNext = false;
    }

    // Halaman pilihan jawaban dengan tombol LANJUT
    function goToChoicesPage(trigger = "stop") {
      if (currentMode !== 'puzzle') return;
      if (!currentQuestionObj) return;
      stopAllPuzzleTimers();
      currentMode = 'choices';
      
      const qData = currentQuestionObj;
      const letters = ['A', 'B', 'C'];
      let choicesHtml = '';
      qData.choices.forEach((ch, idx) => {
        choicesHtml += `
          <div class="choice-card" data-choice-index="${idx}">
            <div class="choice-letter">${letters[idx]}</div>
            <img src="${ch.img}" alt="${ch.name}" onerror="this.src='https://placehold.co/300x260?text=Gambar+Tidak+Ada'">
            <div class="choice-name">${ch.name}</div>
          </div>
        `;
      });
      
      let triggerText = "";
      if (trigger === "buzz") triggerText = "🔔 BUZZ! Pilih jawaban";
      else if (trigger === "stop") triggerText = "⏹️ PUZZLE STOP · Pilih jawaban";
      else if (trigger === "timeout") triggerText = "⏰ WAKTU HABIS! Pilih jawaban";
      else triggerText = "✨ GAMBAR PENUH ✨";
      
      const choicesPageHtml = `
        <div class="choices-page">
          <div class="choices-header">
            <span class="back-hint">🎯 Soal ${currentQIndex+1}/${QUESTIONS.length}</span>
            <span class="score">🏆 ${totalScore}</span>
          </div>
          <div style="text-align: center;">
            <div class="question-text">👤 SIAPAKAH NAMA PAHLAWAN INI?</div>
            <div style="background:#000000aa; display:inline-block; padding:8px 24px; border-radius:60px; color:#ffd966; margin-bottom:20px; font-weight:bold; font-size:18px;">${triggerText}</div>
          </div>
          <div class="choices-grid" id="choicesGrid">
            ${choicesHtml}
          </div>
          <div style="display: flex; justify-content: center; margin-top: 15px;">
            <button class="next-question-btn" id="nextQuestionBtn">➡️ LANJUT KE PERTANYAAN</button>
          </div>
          <p class="next-info">✅ Klik salah satu pilihan untuk menjawab, lalu tekan LANJUT untuk ke soal berikutnya.</p>
        </div>
      `;
      
      appContainer.innerHTML = choicesPageHtml;
      
      // event tombol lanjut
      const nextBtn = document.getElementById('nextQuestionBtn');
      if (nextBtn) {
        nextBtn.addEventListener('click', () => {
          // jika belum menjawab sama sekali, bisa diizinkan lanjut tapi tidak ada skor? lebih baik tidak diizinkan jika belum pernah klik jawaban?
          // sesuai logika: tombol LANJUT tetap bisa dipencet kapan saja, akan memuat pertanyaan selanjutnya tanpa menambah skor jika belum menjawab.
          // tapi akan aman: kita langsung panggil nextQuestion
          nextQuestion();
        });
      }
      
      const cards = document.querySelectorAll('.choice-card');
      let answerLock = false;
      cards.forEach(card => {
        card.addEventListener('click', (e) => {
          if (answerLock) return;
          if (currentMode !== 'choices') return;
          const idx = parseInt(card.getAttribute('data-choice-index'), 10);
          answerLock = true;
          
          const isCorrect = (currentQuestionObj.choices[idx].name === currentQuestionObj.answer);
          if (isCorrect) totalScore++;
          
          const allCards = document.querySelectorAll('.choice-card');
          let correctCardIndex = -1;
          currentQuestionObj.choices.forEach((ch, i) => {
            if (ch.name === currentQuestionObj.answer) correctCardIndex = i;
          });
          
          allCards.forEach((c, i) => {
            c.style.pointerEvents = 'none';
            if (i === correctCardIndex) c.classList.add('correct-feedback');
            if (i === idx && !isCorrect) c.classList.add('wrong-feedback');
          });
          
          // update skor di header
          const scoreSpan = document.querySelector('.choices-header .score');
          if (scoreSpan) scoreSpan.innerText = `🏆 ${totalScore}`;
          
          // tidak otomatis pindah, user harus klik tombol LANJUT
          // jadi answerLock hanya mencegah double answer, tetap bisa lanjut manual
          // tidak perlu auto timeout
        });
      });
    }

    // PUZZLE RENDER
    function renderPuzzleScreen() {
      currentMode = 'puzzle';
      isPaused = false;
      allTilesRevealed = false;
      currentRevealStep = 0;
      timeLeft = MAX_TIME;
      currentQuestionObj = QUESTIONS[currentQIndex];
      if (!currentQuestionObj) { renderResultScreen(); return; }
      
      const order = Array.from({ length: TOTAL_TILES }, (_, i) => i);
      tileOrder = shuffleArray([...order]);
      
      const puzzleHtml = `
        <div class="puzzle-header">
          <span class="timer" id="puzzle-timer">0:30</span>
          <span class="score">🏆 ${totalScore}</span>
        </div>
        <div class="question-label">❓ SIAPAKAH PAHLAWAN INI ?</div>
        <div class="tile-grid-wrap">
          <div class="tile-grid" id="puzzle-grid"></div>
        </div>
        <p class="progress-label" id="puzzle-progress">Soal ${currentQIndex+1}/${QUESTIONS.length} • Puzzle terbuka perlahan</p>
        <div class="action-panel">
          <button class="stop-puzzle-btn" id="stopActionBtn">⏹️ STOP PUZZLE</button>
          <button class="resume-puzzle-btn" id="resumeActionBtn" style="display:none;">▶️ LANJUTKAN</button>
          <button class="buzz-btn" id="buzzActionBtn">🔔 BUZZ!</button>
        </div>
        <div style="height: 5px;"></div>
      `;
      
      appContainer.innerHTML = puzzleHtml;
      buildTileGrid(currentQuestionObj.img);
      
      const stopBtn = document.getElementById('stopActionBtn');
      const resumeBtn = document.getElementById('resumeActionBtn');
      const buzzBtn = document.getElementById('buzzActionBtn');
      if (stopBtn) stopBtn.addEventListener('click', () => pausePuzzle());
      if (resumeBtn) resumeBtn.addEventListener('click', () => resumePuzzle());
      if (buzzBtn) buzzBtn.addEventListener('click', () => buzzToChoices());
      
      startRevealSequence();
      startTimer();
    }
    
    function buildTileGrid(imgSrc) {
      const grid = document.getElementById('puzzle-grid');
      if (!grid) return;
      grid.innerHTML = '';
      const containerWidth = Math.min(720, window.innerWidth * 0.8);
      const tileSize = Math.floor(containerWidth / COLS);
      grid.style.gridTemplateColumns = `repeat(${COLS}, ${tileSize}px)`;
      grid.style.width = `${tileSize * COLS}px`;
      
      for (let r = 0; r < ROWS; r++) {
        for (let c = 0; c < COLS; c++) {
          const idx = r * COLS + c;
          const xPercent = COLS === 1 ? 0 : (c / (COLS - 1)) * 100;
          const yPercent = ROWS === 1 ? 0 : (r / (ROWS - 1)) * 100;
          const tileDiv = document.createElement('div');
          tileDiv.className = 'tile';
          tileDiv.style.width = `${tileSize}px`;
          tileDiv.style.height = `${tileSize}px`;
          tileDiv.innerHTML = `
            <img src="${imgSrc}" style="object-position: ${xPercent}% ${yPercent}%; width: ${COLS * 100}%; height: ${ROWS * 100}%; max-width: none; margin-left: -${c * 100}%; margin-top: -${r * 100}%;" />
            <div class="cover" id="puzzle-cover-${idx}"></div>
          `;
          grid.appendChild(tileDiv);
        }
      }
    }
    
    function startRevealSequence() {
      currentRevealStep = 0;
      puzzleInterval = setInterval(() => {
        if (currentMode !== 'puzzle' || isPaused) return;
        if (currentRevealStep >= tileOrder.length) {
          clearInterval(puzzleInterval);
          puzzleInterval = null;
          allTilesRevealed = true;
          if (!isPaused && currentMode === 'puzzle') {
            goToChoicesPage("puzzle_completed");
          }
          return;
        }
        const tileIndex = tileOrder[currentRevealStep];
        const coverEl = document.getElementById(`puzzle-cover-${tileIndex}`);
        if (coverEl) coverEl.style.opacity = '0';
        currentRevealStep++;
      }, REVEAL_INTERVAL_MS);
    }
    
    function startTimer() {
      timerInterval = setInterval(() => {
        if (currentMode !== 'puzzle' || isPaused) return;
        if (timeLeft <= 1) {
          clearInterval(timerInterval);
          timerInterval = null;
          if (!isPaused && currentMode === 'puzzle') {
            if (puzzleInterval) clearInterval(puzzleInterval);
            puzzleInterval = null;
            forceRevealAllTiles();
            goToChoicesPage("timeout");
          }
          return;
        }
        timeLeft--;
        const timerSpan = document.getElementById('puzzle-timer');
        if (timerSpan) {
          const mins = Math.floor(timeLeft / 60);
          const secs = timeLeft % 60;
          timerSpan.innerText = `${mins}:${secs < 10 ? '0' : ''}${secs}`;
        }
      }, 1000);
    }
    
    function renderResultScreen() {
      currentMode = 'result';
      stopAllPuzzleTimers();
      const percentage = Math.round((totalScore / QUESTIONS.length) * 100);
      let msg = percentage === 100 ? "Sempurna! Pahlawan sejati! 🎉" : (percentage >= 50 ? "Bagus! Terus belajar! 👍" : "Ayo ulangi quiz! 💪");
      appContainer.innerHTML = `
        <div class="result-screen">
          <div class="trophy">🏆🏅</div>
          <h2>QUIZ SELESAI!</h2>
          <p class="final-score">Skor: ${totalScore} / ${QUESTIONS.length}</p>
          <p style="color:#a0c4ff; margin-bottom:28px; font-weight:bold; font-size:20px;">${msg}</p>
          <button class="btn-restart" id="restartQuizBtn">🔄 ULANGI QUIZ</button>
        </div>
      `;
      const restartBtn = document.getElementById('restartQuizBtn');
      if (restartBtn) restartBtn.addEventListener('click', () => {
        totalScore = 0;
        currentQIndex = 0;
        renderPuzzleScreen();
      });
    }
    
    function renderStartScreen() {
      currentMode = 'start';
      appContainer.innerHTML = `
        <div class="start-screen">
          <h1>🎭 TEBAK WAJAH</h1>
          <p>Puzzle Pahlawan Indonesia · STOP untuk jeda & LANJUTKAN</p>
          <button class="btn-start" id="startGameBtn">🚀 MULAI PUZZLE</button>
          <p class="info-text">✨ Puzzle terbuka perlahan. Tekan STOP untuk menghentikan sementara, tekan LANJUT untuk melanjutkan. 🔔 BUZZ langsung ke halaman pilihan jawaban! Setelah menjawab, gunakan tombol "LANJUT KE PERTANYAAN" ✨</p>
        </div>
      `;
      const startBtn = document.getElementById('startGameBtn');
      if (startBtn) startBtn.addEventListener('click', () => {
        totalScore = 0;
        currentQIndex = 0;
        renderPuzzleScreen();
      });
    }
    
    renderStartScreen();
  })();
</script>
</body>
</html>
```