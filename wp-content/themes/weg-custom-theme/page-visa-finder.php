<?php
/**
 * Template Name: Visa Finder
 */

get_header(); ?>

<div class="content-area visa-finder-page">
    <div class="container">
        <header class="visa-finder-header text-center">
            <h2>Visa Finder</h2>
            <p>Answer a few questions to find the right German visa for your situation.</p>
        </header>

        <div class="visa-finder-layout">
            
            <!-- LEFT PANEL: INTERACTIVE QUESTION ENGINE -->
            <div class="left-panel">
                <div id="question-container" class="question-card text-center">
                    <div class="progress-indicator" id="progress-indicator">Step 1</div>
                    <h3 id="question-text">Loading question...</h3>
                    <p id="question-hint" class="hint-text"></p>
                    
                    <div class="button-group">
                        <button id="btn-yes" class="btn btn-yes">YES</button>
                        <button id="btn-no" class="btn btn-no">NO</button>
                    </div>
                </div>

                <div id="result-container" class="result-card text-center" style="display: none;">
                    <h3>🏁 Assessment Complete</h3>
                    <p>Based on your answers, check the right panel for your eligible visas.</p>
                    <button id="btn-restart" class="btn btn-secondary">Start Over</button>
                </div>
            </div>

            <!-- RIGHT PANEL: VISA ELIGIBILITY DASHBOARD -->
            <div class="right-panel">
                <h3>Visa Eligibility</h3>
                <ul id="visa-list" class="visa-list">
                    <!-- Visas will be injected here via JS -->
                </ul>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // 1. Data Structure 
    const initialVisas = [
        { id: 'student', name: 'Student Visa', description: 'For studying at a German university.', url: '#' },
        { id: 'work', name: 'Work Visa', description: 'For qualified professionals with a job offer.', url: '#' },
        { id: 'job_seeker', name: 'Job Seeker Visa', description: 'To look for a job in Germany (requires degree).', url: '#' },
        { id: 'blue_card', name: 'EU Blue Card', description: 'For highly skilled workers with a lucrative job offer.', url: '#' },
        { id: 'family', name: 'Family Reunion Visa', description: 'To join a family member living in Germany.', url: '#' }
    ];

    // Rule Engine
    const questions = [
        {
            id: 'q_degree',
            text: "Do you have a university degree or recognized qualification?",
            hint: "This is required for many working and job-seeking visas.",
            yesEliminates: [],
            noEliminates: ['job_seeker', 'blue_card']
        },
        {
            id: 'q_job',
            text: "Do you have a valid job offer in Germany?",
            hint: "A formal contract or binding offer from a German employer.",
            yesEliminates: ['job_seeker'], // Job seeker not needed if you have a job
            noEliminates: ['work', 'blue_card']
        },
        {
            id: 'q_study',
            text: "Are you accepted into a German university or plan to study?",
            hint: "Including language courses or university degrees.",
            yesEliminates: [],
            noEliminates: ['student']
        },
        {
            id: 'q_family',
            text: "Do you have close family members (spouse/parents) living in Germany?",
            hint: "For family reunification purposes.",
            yesEliminates: [],
            noEliminates: ['family']
        }
    ];

    // 2. State Management
    let currentQuestionIndex = 0;
    let activeVisas = [...initialVisas.map(v => v.id)];
    
    // 3. DOM Elements
    const questionContainer = document.getElementById('question-container');
    const resultContainer = document.getElementById('result-container');
    const questionText = document.getElementById('question-text');
    const questionHint = document.getElementById('question-hint');
    const progressIndicator = document.getElementById('progress-indicator');
    const visaListEl = document.getElementById('visa-list');
    
    const btnYes = document.getElementById('btn-yes');
    const btnNo = document.getElementById('btn-no');
    const btnRestart = document.getElementById('btn-restart');

    // 4. Core Logic Functions
    function renderVisas() {
        visaListEl.innerHTML = '';
        initialVisas.forEach(visa => {
            const isEliminated = !activeVisas.includes(visa.id);
            const li = document.createElement('li');
            li.className = `visa-item ${isEliminated ? 'eliminated' : 'active'}`;
            li.innerHTML = `
                <div class="status-indicator"></div>
                <div>
                    <h4><a href="${visa.url}" class="visa-link">${visa.name}</a></h4>
                    <p>${visa.description}</p>
                </div>
            `;
            visaListEl.appendChild(li);
        });
    }

    function renderQuestion() {
        if (currentQuestionIndex >= questions.length || activeVisas.length <= 1) {
            endAssessment();
            return;
        }

        const q = questions[currentQuestionIndex];
        
        // Add fade animation
        questionContainer.style.opacity = 0;
        setTimeout(() => {
            progressIndicator.innerText = `Step ${currentQuestionIndex + 1} of ${questions.length}`;
            questionText.innerText = q.text;
            questionHint.innerText = q.hint || "";
            questionContainer.style.opacity = 1;
        }, 300);
    }

    function handleAnswer(answer) {
        const q = questions[currentQuestionIndex];
        const eliminatedList = answer === 'yes' ? q.yesEliminates : q.noEliminates;
        
        // Apply Rules
        activeVisas = activeVisas.filter(id => !eliminatedList.includes(id));
        
        // Move to next
        currentQuestionIndex++;
        
        renderVisas();
        renderQuestion();
    }

    function endAssessment() {
        questionContainer.style.display = 'none';
        resultContainer.style.display = 'block';
    }

    function restart() {
        currentQuestionIndex = 0;
        activeVisas = [...initialVisas.map(v => v.id)];
        questionContainer.style.display = 'block';
        resultContainer.style.display = 'none';
        renderVisas();
        renderQuestion();
    }

    // 5. Event Listeners
    btnYes.addEventListener('click', () => handleAnswer('yes'));
    btnNo.addEventListener('click', () => handleAnswer('no'));
    btnRestart.addEventListener('click', restart);

    // Initial render
    renderVisas();
    renderQuestion();
});
</script>

<?php get_footer(); ?>
