<select class="new_minimum_investment_amount form-control" id="new_minimum_investment_amount" name="new_minimum_investment_amount" required>
    <option selected disabled hidden value="">Select an Option</option>
    <option value="{{ $investment_amount }}">Yes</option>
    <option value="No but {{ $investment_amount }} in installments">No, but I can pay in installments</option>
    <option value="No">No</option>
</select>
