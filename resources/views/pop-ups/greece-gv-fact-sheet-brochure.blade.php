
<div class="modal-form-global-container abandon-popup">

    <div class="modal-element">

        <h2 class="title">Before you leave...</h2>

        <img src="/assets/img/content/santorini-popup.jpg" style="width:100%">

        <p class="cta-text">Are you curious about the Greece Golden Visa?<br> Please download our brochure to know more</p>

        {{-- Form --}}
        <form id="brochure-download-form" class="brochure-download-form">

            @csrf

            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="tel" name="phone_number" class="phone-number-extension" placeholder="Phone Number" required>
            <input type="email" name="email_address" placeholder="Email" required>

            <button type="submit">Download Guide</button>

            <a class="brochure-link" style="display:none" href="/assets/ebooks/USInvestorsGuide_PH_2024.pdf" target="_blank"></a>
            <input style="display:none" name="brochure-link" value="fact_sheet">
        </form>

        {{-- <div class="cta-button download-guide">Download Guide</div> --}}

    </div>

</div>