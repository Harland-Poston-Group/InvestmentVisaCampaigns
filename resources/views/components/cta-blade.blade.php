
<!-- resources/views/components/cta-blade.blade.php -->
{{-- @vite('resources/css/chat.scss') --}}

<link rel="stylesheet" href="{{ mix('css/chat.css') }}">
<link rel="stylesheet" href="{{ mix('css/index.css') }}">
<div class="container-fluid mx-0 px-0 mt-5">
<section id="advisor-section" class="mt-5" style="background-image: url('{{ asset('assets/img/ui/contact-us-section.webp') }}');">
    <div class="row h-100">
        <div class="col-12 col-sm-6 order-2 order-sm-1">
            <div class="w-full md:w-1/2">
                <div class="row">
                    <!-- Step 1: Interests -->
                    <div id="step-1" class="step-section ps-5">
                        <h5 class="text-lg font-semibold pt-3"><i class="far fa-question-circle"></i> What are you looking for?</h5>
                        <span style="font-size: 11px;">*You may select more than one option.</span><br>
                        <button class="bt_iv" onclick="toggleInterest('Living Abroad'); toggleButtonHighlight(this)">Living Abroad</button>
                        <button class="bt_iv" onclick="toggleInterest('Investing'); toggleButtonHighlight(this)">Investing</button>
                        <button class="bt_iv" onclick="toggleInterest('Buying Property'); toggleButtonHighlight(this)">Buying Property</button>
                        <button class="bt_iv" onclick="toggleInterest('Business'); toggleButtonHighlight(this)">Business</button>
                        <button class="bt_iv" onclick="toggleInterest('Legal and Tax'); toggleButtonHighlight(this)">Legal and Tax</button>
                        <!--<button class="bt_iv_secondary" onclick="nextStep(2)">Next <i class="fas fa-caret-right"></i></button>-->
                    </div>

                    <!-- Step 2: Location -->
                    <div id="step-2" class="step-section hidden-step ps-5">
                        <h5 class="text-lg font-semibold pt-3"><i class="far fa-compass"></i> Preferred Location</h5>
                        <span style="font-size: 11px;">*You may select more than one option.</span><br>
                        <button class="bt_iv" onclick="toggleLocation('City'); toggleButtonHighlight(this)">City</button>
                        <button class="bt_iv" onclick="toggleLocation('Countryside'); toggleButtonHighlight(this)">Countryside</button>
                        <button class="bt_iv" onclick="toggleLocation('Seashore'); toggleButtonHighlight(this)">Seashore</button>
                        <!--<button class="bt_iv_secondary" onclick="nextStep(3)">Next <i class="fas fa-caret-right"></i></button>-->
                    </div>

                    <!-- Step 3: Budget -->
                    <div id="step-3" class="step-section hidden-step ps-5">
                        <h5 class="text-lg font-semibold pt-3"><i class="fas fa-wallet"></i> Choose Budget Range</h5>
                        <span style="font-size: 11px;">*You may select more than one option.</span><br>
                        <button class="bt_iv" onclick="setBudget('low'); toggleButtonHighlight(this)">Lowest Properties</button>
                        <button class="bt_iv" onclick="setBudget('luxury'); toggleButtonHighlight(this)">Luxury Properties</button>
                        <button class="bt_iv" onclick="setBudgetRange(0, 500000); toggleButtonHighlight(this)">Under €500k</button>
                        <button class="bt_iv" onclick="setBudgetRange(500000, 1000000); toggleButtonHighlight(this)">€500k – €1M</button>
                        <button class="bt_iv" onclick="setBudgetRange(1000000, null); toggleButtonHighlight(this)">Over €1M</button>
                        <!--<button class="bt_iv_secondary" onclick="nextStep(4)">Next <i class="fas fa-caret-right"></i></button> -->
                    </div>

                    <!-- Step 4: Lifestyle -->
                    <div id="step-4" class="step-section hidden-step ps-5">
                        <h5 class="text-lg font-semibold pt-3"><i class="fas fa-heart"></i> Lifestyle and Priorities</h5>
                        <span style="font-size: 11px;">*You may select more than one option.</span><br>
                        <button class="bt_iv" onclick="toggleLifestyle('Nature & Green Spaces'); toggleButtonHighlight(this)">Nature & Green</button>
                        <button class="bt_iv" onclick="toggleLifestyle('Transport & Connectivity'); toggleButtonHighlight(this)">Transport</button>
                        <button class="bt_iv" onclick="toggleLifestyle('Education & Schools'); toggleButtonHighlight(this)">Education</button>
                        <button class="bt_iv" onclick="toggleLifestyle('Healthcare & Safety'); toggleButtonHighlight(this)">Healthcare</button>
                        <button class="bt_iv" onclick="toggleLifestyle('Investment Potential'); toggleButtonHighlight(this)">Investment</button>
                        <button class="bt_iv" onclick="toggleLifestyle('Culture and Social Life'); toggleButtonHighlight(this)">Culture</button>
                        <!--<button class="bt_iv_secondary" onclick="fetchFinalResults(5)">Next <i class="fas fa-caret-right"></i></button> -->
                    </div>

                    <!-- Step 5: Results -->
                    <div id="step-5" class="step-section hidden-step ps-5">
                        <h2 class="text-lg font-semibold">📊 Finding the best for you...</h2>
                        <button class="bt_iv" onclick="fetchFinalResults()">🔍 Show Results</button>
                    </div>

                </div>


                <div class="row">
                    <!-- LEFT: Results -->
                    <div class="col-12 col-md-6 order-2 order-sm-1">
                        <div id="chat-results" class="p-4 mt-1 shadow-inner h-96">
                            <!-- 🔍 Results from fetchFinalResults() will go here -->
                        </div>
                    </div>

                    <!-- RIGHT: Chat -->
                    <div class="col-12 col-md-6 order-1 order-sm-2">
                        <div id="cta-chatbox" class="bg-gray-100 p-4 rounded-lg shadow-inner flex flex-col space-y-2 h-96">
                            <div class="flex gap-2" style="display: flex;">
                                <div class="selected-advisor-img">
                                    <img width="60px" src="/assets/img/ui-helper/thumbs/simon hobson.png" alt="Staff Member" class="shadow advisor rounded-full">
                                </div>
                                <div class="chat-bubble bot-bubble my-2 shadow">
                                    Hi there! How can I assist you today?<br>
                                    <span class="opt-message hidden">
                                        <i class="fa-solid fa-arrow-up" style="transform: rotate(-40deg);"></i> Please select your options.
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Chatbox -->

            </div>
        </div>
        <div class="col-12 col-sm-6 order-1 order-sm-2">
            <!-- Right Column: Staff Image + Info -->
            <div id="advisor" class="w-full relative h-100  pt-3">
                <h3 class="text-xl font-semibold">Need personalized help?</h3>
                <p class="text-gray-600">Our team is here to guide you step by step. Let’s talk!</p>
                <div class="px-1 flex" style="display: flex;flex-direction: column; align-content: flex-start;flex-wrap: nowrap;">
                    <div class="choose-advisor shadow border ps-0 my-2 col-4 active">
                        <a href="#" class="flex grid-cols-2" style="display: flex;">
                            <div>
                                <img width="60px" src="/assets/img/ui-helper/thumbs/simon hobson.png" alt="Staff Member" class="shadow">
                            </div>
                            <div>
                                <span class="text-left ps-2"><b>Simon Hobson</b></span><br>
                                <span class="position text-left pb-2 ps-2">Investment Director</span>
                            </div>
                        </a>
                    </div>
                    <div class="choose-advisor shadow border ps-0 my-2 col-4">
                        <a href="#" class="flex grid-cols-2" style="display: flex;">
                            <div>
                                <img width="60px" src="/assets/img/ui-helper/thumbs/keith poston.webp" alt="Staff Member" class="shadow">
                            </div>
                            <div>
                                <span class="text-center ps-2"><b>Keith Poston</b></span><br>
                                <span class="position text-center ps-2">Business Development Manager</span>
                            </div>

                        </a>
                    </div>
                    <div class="choose-advisor shadow border ps-0 my-2 col-4">
                        <a href="#" class="flex grid-cols-2" style="display: flex;">
                        <div>
                            <img width="60px" src="/assets/img/ui-helper/thumbs/george hobson.webp" alt="Staff Member" class="shadow">
                        </div>
                            <div>
                                <span class="text-center ps-2"><b>George Hobson</b></span><br>
                                <span class="position text-center ps-2">Senior Investment Advisor</span>
                            </div>
                        </a>
                    </div>
                    <div class="choose-advisor shadow border ps-0 my-2 col-4">
                        <a href="#" class="flex grid-cols-2" style="display: flex;">
                            <div>
                                <img width="60px" src="/assets/img/ui-helper/thumbs/ryan dunn.webp" alt="Staff Member" class="shadow">
                            </div>
                            <div>
                                <span class="text-center ps-2"><b>Ryan Dunn</b></span><br>
                                <span class="position text-center ps-2">Regional Manager UK</span>

                            </div>
                        </a>
                    </div>
                    <div class="choose-advisor shadow border ps-0 my-2 col-4">
                        <a href="#" class="flex grid-cols-2" style="display: flex;">
                            <div>
                                <img width="60px" src="/assets/img/ui-helper/thumbs/mathew mcgurn.webp" alt="Staff Member" class="shadow">
                            </div>
                            <div>
                                <span class="text-center pb-2 ps-2"><b>Mathew Mcgurn</b></span><br>
                                <span class="position text-center pb-2 ps-2">Senior Investment Advisor</span>
                            </div>
                        </a>
                    </div>
                </div>
                <img id="main-advisor-img" src="/assets/img/ui-helper/simon hobson.webp" alt="Staff Member" class="object-cover absolute bottom-0 right-0">
            </div>
        </div>
    </div>
</section>
</div>
<script>
    const advisorMap = {
        'Simon Hobson': 'webp',
        'Keith Poston': 'png',
        'George Hobson': 'png',
        'Ryan Dunn': 'png',
        'Mathew Mcgurn': 'png'
    };

    const mainAdvisorImg = document.getElementById('main-advisor-img');
    const advisorButtons = document.querySelectorAll('.choose-advisor a');
    let currentAdvisorName = 'Simon Hobson'; // Default



    advisorButtons.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            currentAdvisorName = this.querySelector('span').innerText.trim();  // No "const" here!

            const ext = advisorMap[currentAdvisorName] || 'png';
            const fileName = currentAdvisorName.toLowerCase();

            const chatAvatarSrc = `/assets/img/ui-helper/thumbs/${fileName}.${ext}`;
            const mainImageSrc = `/assets/img/ui-helper/${fileName}.${ext}`;

            // === Fade out all advisor images ===
            const allAdvisorImgs = document.querySelectorAll('img.advisor');
            allAdvisorImgs.forEach(img => img.classList.add('opacity-0'));
            mainAdvisorImg.classList.add('opacity-0');

            setTimeout(() => {
                // === Update ALL chat avatars ===
                allAdvisorImgs.forEach(img => {
                    img.src = chatAvatarSrc;
                    img.alt = currentAdvisorName;
                    img.classList.remove('opacity-0');
                    //img.classList.add('opacity-100');
                });

                // === Update Main Advisor Image ===
                mainAdvisorImg.src = mainImageSrc;
                mainAdvisorImg.alt = currentAdvisorName;
                mainAdvisorImg.classList.remove('opacity-0');
                //mainAdvisorImg.classList.add('opacity-100');
            }, 600); // Match transition time

            // === Manage Active Class ===
            document.querySelectorAll('.choose-advisor').forEach(div => {
                div.classList.remove('active');
            });
            this.closest('.choose-advisor').classList.add('active');
           // console.log(currentAdvisorName);

        });

    });


</script>
<script>
    let chatData = {
        interests: [],
        locations: [],
        budgetRange: null,
        lifestyle: []
    };

    // Toggle Helpers
    function toggleItem(arr, val) {
        const i = arr.indexOf(val);
        i > -1 ? arr.splice(i, 1) : arr.push(val);
    }

    function toggleButtonHighlight(btn) {
        btn.classList.toggle('selected');
    }

    function toggleInterest(val) {
        toggleItem(chatData.interests, val);
        showInterestBubble();
        // console.log('Interests:', chatData.interests);

    }

    let interestBubbleId = 'interest-bubble'; // Unique ID to target/update bubble

    function showInterestBubble() {
        const messagesDiv = document.getElementById('cta-chatbox');
        const existingBubble = document.getElementById(interestBubbleId);

        const advisorExt = advisorMap[currentAdvisorName] || 'png';
        const fileName = currentAdvisorName.toLowerCase();
        const currentThumb = `/assets/img/ui-helper/thumbs/${fileName}.${advisorExt}`;

        const summary = `<i class="fas fa-info-circle"></i> You're interested in:<b> ${chatData.interests.join(', ') || 'None yet'}</b>`;

        const nextButtonHTML = `
        <div class="mt-2 text-right">
            <button id="bt-1" class="bt_iv_secondary float-end ms-1" onclick="nextStep(2)">
                Please, choose a Location <i class="fas fa-caret-right"></i>
            </button>
        </div>`;

        if (existingBubble) {
            const chatBubble = existingBubble.querySelector('.chat-bubble');
            chatBubble.innerHTML = summary;

            // Update avatar inside existing bubble 🔥
            const avatarImg = existingBubble.querySelector('img');
            if (avatarImg) {
                avatarImg.src = currentThumb;
                avatarImg.alt = currentAdvisorName;
            }

            // Only show Next if we're still on Step 1
            if (!document.querySelector('#step-1').classList.contains('hidden-step')) {
                chatBubble.innerHTML += nextButtonHTML;
            }
        } else {
            messagesDiv.innerHTML += `
        <div id="${interestBubbleId}" class="flex grid-cols-2">
            <div class="chat-bubble user-bubble">
                ${summary}
                ${nextButtonHTML}
            </div>
            <div class="selected-advisor-img"><img src="${currentThumb}" width="60" class="rounded-full shadow advisor"></div>
        </div>`;
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }
    }

    function toggleLocation(val) {
        toggleItem(chatData.locations, val);
        // console.log('Locations:', chatData.locations);
        showLocationBubble();
    }
    let locationBubbleId = 'location-bubble';

    function showLocationBubble() {

        let firstButton = document.getElementById('bt-1');
        //console.log(lastButton);
        firstButton.style.display = 'none'

        const messagesDiv = document.getElementById('cta-chatbox');
        const existingBubble = document.getElementById(locationBubbleId);
        const advisorImgEl = document.querySelector('#selected-advisor-img img');

        const advisorExt = advisorMap[currentAdvisorName] || 'png';
        const fileName = currentAdvisorName.toLowerCase();
        const currentThumb = `/assets/img/ui-helper/thumbs/${fileName}.${advisorExt}`;

        //console.log(currentThumb);

        const summary = `<i class="fas fa-street-view"></i> Preferred location:<b> ${chatData.locations.join(', ') || 'None yet'}</b>`;

        const nextButtonHTML = `
        <div class="mt-2 text-right">
            <button id="bt-2" class="ms-1 bt_iv_secondary float-end" onclick="nextStep(3)">
                What's your Budget <i class="fas fa-caret-right"></i>
            </button>
        </div>`;

        if (existingBubble) {
            const chatBubble = existingBubble.querySelector('.chat-bubble');
            chatBubble.innerHTML = summary;

            if (!document.querySelector('#step-2').classList.contains('hidden-step')) {
                chatBubble.innerHTML += nextButtonHTML;
            }
        } else {
            messagesDiv.innerHTML += `
        <div id="${locationBubbleId}" class="flex grid-cols-2">
            <div class="chat-bubble user-bubble">
                ${summary}
                ${nextButtonHTML}
            </div>
            <div><img src="${currentThumb}" width="60" class="rounded-full shadow advisor"></div>
        </div>`;
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }
    }


    function toggleLifestyle(val) {
        toggleItem(chatData.lifestyle, val);
        // console.log('Lifestyle:', chatData.lifestyle);
        showLifestyleBubble();
    }

    let lifestyleBubbleId = 'lifestyle-bubble';

    function showLifestyleBubble() {

        let firstButton = document.getElementById('bt-3');
        //console.log(lastButton);
        firstButton.style.display = 'none'

        const messagesDiv = document.getElementById('cta-chatbox');
        const existingBubble = document.getElementById(lifestyleBubbleId);
        const advisorImgEl = document.querySelector('#selected-advisor-img img');
        const advisorExt = advisorMap[currentAdvisorName] || 'png';
        const fileName = currentAdvisorName.toLowerCase();
        const currentThumb = `/assets/img/ui-helper/thumbs/${fileName}.${advisorExt}`;
        const summary = `<i class="far fa-heart"></i> Priorities<b>: ${chatData.lifestyle.join(', ') || 'None yet'}</b>`;

        const nextButtonHTML = `
        <div class="mt-2 text-right">
            <button id="bt-4" class="bt_iv_secondary float-end" onclick="fetchFinalResults()">
                Next <i class="fas fa-caret-right"></i>
            </button>
        </div>`;

        if (existingBubble) {
            const chatBubble = existingBubble.querySelector('.chat-bubble');
            chatBubble.innerHTML = summary;

            if (!document.querySelector('#step-4').classList.contains('hidden-step')) {
                chatBubble.innerHTML += nextButtonHTML;
            }
        } else {
            messagesDiv.innerHTML += `
        <div id="${lifestyleBubbleId}" class="flex grid-cols-2">
            <div class="chat-bubble user-bubble">
                ${summary}
                ${nextButtonHTML}
            </div>
            <div><img src="${currentThumb}" width="60" class="rounded-full shadow advisor"></div>
        </div>`;
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }
    }

    // Budget Setters
    function setBudget(type) {
        chatData.budgetRange = type; // 'low' or 'luxury'
        //console.log('Budget Type:', chatData.budgetRange);
        showBudgetBubble();

    }

    function setBudgetRange(min, max) {
        chatData.budgetRange = { min, max };
        // console.log('Budget:', chatData.budgetRange);
        showBudgetBubble();

    }

    let budgetBubbleId = 'budget-bubble';

    function showBudgetBubble() {

        let secondButton = document.getElementById('bt-2');
        //console.log(lastButton);
        secondButton.style.display = 'none'

        const messagesDiv = document.getElementById('cta-chatbox');
        const existingBubble = document.getElementById(budgetBubbleId);
        const advisorImgEl = document.querySelector('#selected-advisor-img img');
        const advisorExt = advisorMap[currentAdvisorName] || 'png';
        const fileName = currentAdvisorName.toLowerCase();
        const currentThumb = `/assets/img/ui-helper/thumbs/${fileName}.${advisorExt}`;
        let summary = '';
        if (typeof chatData.budgetRange === 'string') {
            summary = `<i class="far fa-money-bill-alt"></i> Budget: <b>${chatData.budgetRange.charAt(0).toUpperCase() + chatData.budgetRange.slice(1)}</b>`;
        } else if (typeof chatData.budgetRange === 'object' && chatData.budgetRange !== null) {
            const min = chatData.budgetRange.min ?? 0;
            const max = chatData.budgetRange.max;
            summary = `<i class="far fa-money-bill-alt"></i> Budget:<b> €${min.toLocaleString()} – ${max ? "€" + max.toLocaleString() : "</b>+"}`;
        } else {
            summary = `<i class="far fa-money-bill-alt"></i> Budget: Not selected`;
        }

        const nextButtonHTML = `
        <div class="mt-2 text-right">
            <button id="bt-3" class="ms-1 bt_iv_secondary float-end" onclick="nextStep(4)">
                 Tell me about your Lifestyle<i class="fas fa-caret-right"></i>
            </button>
        </div>`;

        if (existingBubble) {
            const chatBubble = existingBubble.querySelector('.chat-bubble');
            chatBubble.innerHTML = summary;

            if (!document.querySelector('#step-3').classList.contains('hidden-step')) {
                chatBubble.innerHTML += nextButtonHTML;
            }
        } else {
            messagesDiv.innerHTML += `
        <div id="${budgetBubbleId}" class="flex grid-cols-2">
            <div class="chat-bubble user-bubble">
                ${summary}
                ${nextButtonHTML}
            </div>
            <div><img src="${currentThumb}" width="60" class="rounded-full shadow advisor"></div>
        </div>`;
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }
    }

    // Step Transition Logic
    function nextStep(stepNumber) {
        const currentStep = document.querySelector('.step-section:not(.hidden-step)');
        const nextStepEl = document.getElementById(`step-${stepNumber}`);

        if (currentStep && nextStepEl) {
            currentStep.classList.add('hidden-step');
            setTimeout(() => {
                nextStepEl.classList.remove('hidden-step');
            }, 300);
        }

        if (stepNumber >= 1 && stepNumber <= 4) {
            showStepSummary(stepNumber);
        }

        if (stepNumber === 5) {
            showFinalSummary(); // Chat feedback before fetch
        }
    }

    // Chat Feedback per Step 💬
    function showStepSummary(step) {
        const messagesDiv = document.getElementById('cta-chatbox');
        let summary = '';

        switch (step) {
            case 1:
                if (!chatData.interests.length) return; // No data, skip
                summary = `🔎 You're interested in: ${chatData.interests.join(', ')}`;
                break;
            case 2:
                if (!chatData.locations.length) return;
                summary = `📍 Preferred location: ${chatData.locations.join(', ')}`;
                break;
            case 3:
                if (!chatData.budgetRange) return;
                if (typeof chatData.budgetRange === 'string') {
                    summary = `💶 Budget: ${chatData.budgetRange.charAt(0).toUpperCase() + chatData.budgetRange.slice(1)}`;
                } else {
                    const min = chatData.budgetRange.min ?? 0;
                    const max = chatData.budgetRange.max;
                    summary = `💶 Budget: €${min.toLocaleString()} – ${max ? "€" + max.toLocaleString() : "+"}`;
                }
                break;
            case 4:
                if (!chatData.lifestyle.length) return;
                summary = `⚡ Priorities: ${chatData.lifestyle.join(', ')}`;
                break;
        }

        const advisorImgEl = document.querySelector('#selected-advisor-img img');
        const currentThumb = advisorImgEl ? advisorImgEl.src : '/assets/img/ui-helper/thumbs/simon hobson.png';

        messagesDiv.innerHTML += `
        <div class="flex items-end gap-2 justify-end">
            <div class="chat-bubble user-bubble">${summary}</div>
            <img src="${currentThumb}" width="40" class="rounded-full shadow advidor">
        </div>`;
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }


    // Final Summary + Fetch
    function showFinalSummary() {
        const messagesDiv = document.getElementById('cta-chatbox');
        messagesDiv.innerHTML += `<div class="chat-bubble user-bubble">✅ Let me find content for your preferences...</div>`;
        //messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }

    // Final Fetch — Step 5 Results
    function fetchFinalResults() {
        const messagesDiv = document.getElementById('cta-chatbox');
        const resultsDiv = document.getElementById('chat-results');

        const firstName = currentAdvisorName.split(' ')[0];

        const messages = [
            //`${firstName} is scratching his head...`,
            //`Elton is calling Andrew...`,
            `${firstName} is searching News...`,
            `${firstName} is searching FAQs...`,
            //`Elton is calling Andrew...`,
            `${firstName} is searching Properties...`,
            //`Andrew is asking the dev...`,
            `${firstName} is gathering all the best results for you...`
        ];

        let lastButton = document.getElementById('bt-4');
        if (lastButton) lastButton.style.display = 'none';

        // Helper to create typing bubble
        function createTypingBubble(text) {
            const bubble = document.createElement('div');
            bubble.className = "chat-bubble bot-bubble typing-bubble shadow";
            bubble.innerHTML = `
            <div class="row">
                <div class="col-10">${text}</div>
                <div class="col-2"><i class="fa-solid fa-spinner fa-spin-pulse"></i></div>
            </div>`;
            return bubble;
        }

        let currentIndex = 0;

        function showNextMessage() {
            if (currentIndex < messages.length) {
                const typingBubble = createTypingBubble(messages[currentIndex]);
                messagesDiv.appendChild(typingBubble);
                messagesDiv.scrollTop = messagesDiv.scrollHeight;

                setTimeout(() => {
                    typingBubble.remove();
                    currentIndex++;
                    showNextMessage();
                }, 1500);
            } else {
                // Final fetch after all bubbles
                fetch('/chatbot/wizard-results', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify(chatData),
                })
                    .then(res => res.json())
                    .then(data => {
                        messagesDiv.innerHTML += `
                    <div class="flex gap-2 justify-start">
                        <div id="pointer-results" class="chat-bubble bot-bubble mt-1">
                            <!-- <i class="far fa-hand-point-left"></i> -->
                            <span class="d-inline d-sm-none"> All set! Check the results bellow!</span>
                            <i class="far fa-hand-point-down d-inline d-sm-none"></i>  <!-- Visible on mobile -->
                            <i class="far fa-hand-point-left d-none d-sm-inline"></i>   <!-- Visible on larger screens -->
                            <span class="d-none d-sm-inline"> All set! Check the results on the left!</span>
                        </div>
                        <button onclick="resetWizard()" class="bt_iv_secondary float-end mt-2">
                            <i class="fas fa-redo-alt"></i> Start Over
                        </button>
                        <button id='know-more-HP' class='mx-2 bt_iv float-end mt-2 card'>Know More?</button>
                    </div>`;
                        messagesDiv.scrollTop = messagesDiv.scrollHeight;

                        resultsDiv.innerHTML = data.reply;
                        resultsDiv.innerHTML += `
                    <div class="mt-4 text-right">
                        <button onclick="resetWizard()" class="bt_iv_secondary">
                            <i class="fas fa-redo-alt"></i> Start Over
                        </button>
                        <!--<button id='know-more-HP' class='bt_iv float-end'>Know More</button> -->
                    </div>`;
                    });
            }
        }

        // Start the sequence
        showNextMessage();
    }

    document.addEventListener('click', function(e) {
        const clickableCard = e.target.closest('.card');

        if (clickableCard && clickableCard.id.startsWith('know-more')) {
            e.preventDefault();

            const type = clickableCard.id.replace('know-more-', '');

            const messagesDiv = document.getElementById('cta-chatbox');

            const existingForm = document.getElementById('chat-form');
            if (existingForm) {
                existingForm.remove();
            }

            const formBubble = `
            <div id="chat-form" class="chat-bubble bot-bubble mt-2 shadow">
                <div class="cntr">
                    <label for="rdo-1" class="btn-radio">
                      <input type="radio" id="rdo-1" name="radio-grp" checked>
                      <svg width="20px" height="20px" viewBox="0 0 20 20">
                        <circle cx="10" cy="10" r="9"></circle>
                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                      </svg>
                      <span>Subscribe Newsletter</span>
                    </label>
                    <label for="rdo-2" class="btn-radio">
                      <input type="radio" id="rdo-2" name="radio-grp">
                      <svg width="20px" height="20px" viewBox="0 0 20 20">
                        <circle cx="10" cy="10" r="9"></circle>
                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                      </svg>
                      <span>Email Me</span>
                    </label>
                    <label for="rdo-3" class="btn-radio">
                      <input type="radio" id="rdo-3" name="radio-grp">
                      <svg width="20px" height="20px" viewBox="0 0 20 20">
                        <circle cx="10" cy="10" r="9"></circle>
                        <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                        <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                      </svg>
                      <span>Phone Me</span>
                    </label>
                </div>
                <div class="form-section" id="form-newsletter">
                <strong>📩 Stay updated on ${type}!</strong><br>
                Subscribe and get updates directly.
                <form action="/subscribe-newsletter" onsubmit="subscribe(event)" method="POST" class="mt-2 space-y-2">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="form_name" value="Subscribe Newsletter:">
                  <input type="text" name="name" placeholder="Your Full Name" required class="border p-1 rounded w-full text-sm my-1">
                  <input type="email" name="email" placeholder="Your email" required class="border p-1 rounded w-full text-sm">
                  <input type="hidden" name="advisor_name" value="${currentAdvisorName}">
                  <input type="hidden" name="interests" value="${chatData.interests.join(', ')}">
                  <input type="hidden" name="locations" value="${chatData.locations.join(', ')}">
                  <input type="hidden" name="budget" value="${typeof chatData.budgetRange === 'string' ? chatData.budgetRange : JSON.stringify(chatData.budgetRange)}">
                  <input type="hidden" name="lifestyle" value="${chatData.lifestyle.join(', ')}">
                  <input type="hidden" name="content_type" value="${type}">
                  <button type="submit" class="bg-green-500 text-black px-3 py-1 rounded text-sm hover:bg-green-600 my-3">
                    Subscribe
                  </button>
                </form>
              </div>
              <div class="form-section hidden" id="form-email">
                    <strong>📨 Drop us an email</strong>
                    <form onsubmit="sendEmail(event)" action="/send-email" method="POST" class="mt-2 space-y-2">
                    <input type="hidden" name="form_name" value="Contact me by Email:">
                    <input type="text" name="name" placeholder="Your Full Name" required class="border p-1 rounded w-full text-sm my-1">
                      <input type="email" name="email" placeholder="Your email" required class="border p-1 rounded w-full text-sm my-1">
                      <select name="enquiry_subject" id="enquiry_subject" required class="border p-1 rounded w-full text-sm">
                        <option value="" hidden selected>What are you looking for to discuss?</option>
                        <option value="Business Visa">Business Visa</option>
                        <option value="Golden Visa">Golden Visa</option>
                        <option value="Investment Opportunities">Investment Opportunities</option>
                        <option value="Real Estate Investment">Real Estate Investment</option>
                      </select>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="advisor_name" value="${currentAdvisorName}">
                      <input type="hidden" name="interests" value="${chatData.interests.join(', ')}">
                                  <input type="hidden" name="locations" value="${chatData.locations.join(', ')}">
<input type="hidden" name="budget" value="${typeof chatData.budgetRange === 'string' ? chatData.budgetRange : JSON.stringify(chatData.budgetRange)}">
                                  <input type="hidden" name="lifestyle" value="${chatData.lifestyle.join(', ')}">
                                  <input type="hidden" name="content_type" value="${type}">
                      <button type="submit" class="bg-blue-500 text-black px-3 py-1 rounded text-sm hover:bg-blue-600 my-3">
                        Send
                      </button>
                    </form>
                  </div>
            <div class="form-section hidden" id="form-call">
                <strong>📞 Request a call back</strong>
                <form onsubmit="requestCall(event)" action="/request-call" method="POST" class="mt-2 space-y-2">
                  <input type="hidden" name="form_name" value="Request a Call:">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="text" name="name" placeholder="Your Full Name" required class="border p-1 rounded w-full text-sm my-1">
                  <input type="tel" name="phone" placeholder="Your phone number ( +___ ___ ___ ___ )" required class="border p-1 rounded w-full text-sm">
                  <input type="hidden" name="advisor_name" value="${currentAdvisorName}">
                  <input type="hidden" name="interests" value="${chatData.interests.join(', ')}">
                  <input type="hidden" name="locations" value="${chatData.locations.join(', ')}">
<input type="hidden" name="budget" value="${typeof chatData.budgetRange === 'string' ? chatData.budgetRange : JSON.stringify(chatData.budgetRange)}">
                  <input type="hidden" name="lifestyle" value="${chatData.lifestyle.join(', ')}">
                  <input type="hidden" name="content_type" value="${type}">
                  <button type="submit" class="bg-yellow-500 text-black px-3 py-1 rounded text-sm hover:bg-yellow-600 my-3">
                    Call Me
                  </button>
                </form>
              </div>

            </div>`;

            // messagesDiv.innerHTML += formBubble;
            messagesDiv.insertAdjacentHTML('beforeend', formBubble);
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const messagesDiv = document.getElementById('cta-chatbox');

        // Use event delegation
        messagesDiv.addEventListener('change', function (e) {
            const target = e.target;

            if (target.matches('.cntr input[type="radio"]')) {
                const id = target.id;
                const labelText = target.closest('.btn-radio').querySelector('span').textContent;

                // Your logic
                if (id === 'rdo-1') {
                    console.log('1');
                    document.getElementById('form-newsletter').classList.remove('hidden');
                    document.getElementById('form-email').classList.add('hidden');
                    document.getElementById('form-call').classList.add('hidden');

                } else if (id === 'rdo-2') {
                    console.log('2');
                    document.getElementById('form-email').classList.remove('hidden');
                    document.getElementById('form-newsletter').classList.add('hidden');
                    document.getElementById('form-call').classList.add('hidden');

                } else if (id === 'rdo-3') {
                    console.log('3');
                    document.getElementById('form-call').classList.remove('hidden');
                    document.getElementById('form-email').classList.add('hidden');
                    document.getElementById('form-newsletter').classList.add('hidden');

                }

                //  console.log(`Selected: ${labelText} (ID: ${id})`);
            }
        });
    });


    function subscribe(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
            .then(res => {
                if (!res.ok) throw new Error('Not a valid response');
                return res.json();
            })
            .then(data => {
                const advisorExt = advisorMap[currentAdvisorName] || 'png';
                const fileName = currentAdvisorName.toLowerCase();
                const currentThumb = `/assets/img/ui-helper/thumbs/${fileName}.${advisorExt}`;

                showToast(data.message || '📨 Subscribed successfully!', 'success', currentThumb);
                form.reset();
            })
            .catch(err => {
                console.error(err);
                showToast('⚠️ Oops! Something went wrong.', 'error');
            });
    }



    function sendEmail(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        fetch('/send-email', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest', // tells Laravel to return JSON
            },
            body: formData
        })
            .then(res => {
                if (!res.ok) throw new Error("Failed to send email");
                return res.json();
            })
            .then(data => {
                // showToast(data.message || '📨 Email sent successfully!');
                const advisorExt = advisorMap[currentAdvisorName] || 'png';
                const fileName = currentAdvisorName.toLowerCase();
                const currentThumb = `/assets/img/ui-helper/thumbs/${fileName}.${advisorExt}`;

                showToast(data.message || '📨 Email sent successfully!', 'success', currentThumb);
                form.reset();
            })
            .catch(() => {
                alert('⚠️ Something went wrong while sending your message.');
            });
    }

    function requestCall(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: formData
        })
            .then(res => {
                if (!res.ok) throw new Error("Failed to submit call request");
                return res.json();
            })
            .then(data => {
                // showToast(data.message || '📞 Call request sent successfully!');
                const advisorExt = advisorMap[currentAdvisorName] || 'png';
                const fileName = currentAdvisorName.toLowerCase();
                const currentThumb = `/assets/img/ui-helper/thumbs/${fileName}.${advisorExt}`;

                showToast(data.message || '📞 Call request sent successfully!', 'success', currentThumb);
                form.reset();
            })
            .catch(() => {
                alert('⚠️ Something went wrong while requesting your call.');
            });
    }


    function showToast(message, type = 'success', imageSrc = null) {
        let content = imageSrc
            ? `<div style="display:flex; align-items:center;">
                <img src="${imageSrc}" width="30" style="border-radius:50%; margin-right:10px;">
                <span>${message}</span>
           </div>`
            : message;

        Toastify({
            text: content,
            duration: 4000,
            gravity: "bottom",
            position: "center",
            backgroundColor: type === 'error' ? "#b16cdf" : "#6A257A",
            style: {
                width: "380px",          // 👈 Set your custom width here
                padding: "10px 15px",    // optional: tweak padding if needed
                borderRadius: "8px"      // optional: cleaner rounded corners
            },
            close: true,
            escapeMarkup: false, // Allow HTML in text
            rtl: true
        }).showToast();
    }

    // Optional: Chat input (for manual text input if needed)
    function ctaSendMessage() {
        const input = document.getElementById('cta-user-input');
        const msg = input.value.trim();
        if (!msg) return;

        const messagesDiv = document.getElementById('cta-chatbox');
        messagesDiv.innerHTML += `<div class="chat-bubble user-bubble mt-1">${msg}</div>`;
        input.value = '';
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }

    function resetWizard() {
        // Reset chatData
        chatData = {
            interests: [],
            locations: [],
            budgetRange: null,
            lifestyle: []
        };

        // Clear chatbox and results
        document.getElementById('cta-chatbox').innerHTML = `
        <div class="flex gap-2" style="display: flex;">
            <div class="selected-advisor-img">
                <img width="60px" src="/assets/img/ui-helper/thumbs/simon hobson.png" alt="Staff Member" class="shadow advisor rounded-full">
            </div>
            <div class="chat-bubble bot-bubble my-2 shadow">
                Hi there! How can I assist you today? <br>
                <span class="opt-message hidden">
                <i class="fa-solid fa-arrow-up" style="transform: rotate(-40deg);"></i> Please select your options.
                </span>
            </div>
        </div>`;

        document.getElementById('chat-results').innerHTML = '';

        // Reset to Step 1
        const allSteps = document.querySelectorAll('.step-section');
        allSteps.forEach(step => step.classList.add('hidden-step'));
        document.getElementById('step-1').classList.remove('hidden-step');

        // 🧹 Clear button highlights (optional, if buttons toggle classes like 'selected')
        const selectedButtons = document.querySelectorAll('.bt_iv.selected');
        selectedButtons.forEach(btn => btn.classList.remove('selected'));

        // console.log('Wizard reset complete 🔄');



    }
</script>
<style>
    .toastify {
        width: 40% !important;
        min-width: 40% !important;
    }
    .toastify .toast-close {
        position: absolute;
        top: 6px;
        right: 8px;
        font-size: 18px;
        color: #fff;
    }


    .cntr {
        display: flex;
        margin: auto;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: space-between;
        align-items: baseline;
    }

    .btn-radio {
        cursor: pointer;
        display: inline-block;
        float: left;
        -webkit-user-select: none;
        user-select: none;
    }

    .btn-radio:not(:first-child) {
        margin-left: 20px;
    }

    @media screen and (max-width: 480px) {
        .btn-radio {
            display: block;
            float: none;
        }

        .btn-radio:not(:first-child) {
            margin-left: 0;
            margin-top: 15px;
        }
    }

    .btn-radio svg {
        fill: none;
        vertical-align: middle;
    }

    .btn-radio svg circle {
        stroke-width: 2;
        stroke: #C8CCD4;
    }

    .btn-radio svg path {
        stroke: #6A257A;
    }

    .btn-radio svg path.inner {
        stroke-width: 6;
        stroke-dasharray: 19;
        stroke-dashoffset: 19;
    }

    .btn-radio svg path.outer {
        stroke-width: 2;
        stroke-dasharray: 57;
        stroke-dashoffset: 57;
    }

    .btn-radio input {
        display: none;
    }

    .btn-radio input:checked + svg path {
        transition: all 0.4s ease;
    }

    .btn-radio input:checked + svg path.inner {
        stroke-dashoffset: 38;
        transition-delay: 0.3s;
    }

    .btn-radio input:checked + svg path.outer {
        stroke-dashoffset: 0;
    }

    .btn-radio span {
        display: inline-block;
        vertical-align: middle;
    }

    @media (max-width:768px) {
        .btn-radio span {
            font-size: 14px;
        }
    }


</style>

