<script id="tmp-select-district" type="text/template">
    <option value="0">Select District</option>
    {{#response}}
    <option value="{{district_id}}">{{names}}</option>
    {{/response}}
</script>

<script id="tmp-select-wards" type="text/template">
    <option value="0">Select Ward</option>
    {{#response}}
    <option value="{{ward_id}}">{{names}}</option>
    {{/response}}
</script>

<script id="tmp-select-region" type="text/template">
    <option value="0">Select Region</option>
    {{#response}}
    <option value="{{region_id}}">{{names}}</option>
    {{/response}}
</script>

<script id="tmp-select-subcategory" type="text/template">
    <option value="">Select Category</option>
    {{#response}}
    <option value="{{sub_category_id}}">{{names}}</option>
    {{/response}}
</script>

<script id="tmp-select-plans" type="text/template">
    <option value="">Select Plan</option>
    {{#response}}
    <option value="{{plan_id}}">{{names}}</option>
    {{/response}}
</script>
<script id="tmp-select-plans-quote" type="text/template">
    <option value="">Select Plan</option>
    {{#response}}
    <option value="{{plan_id}},{{quoteform}}">{{names}}</option>
    {{/response}}
</script>

<script id="tmp-claim-insert" type="text/template">
    <div class="alert alert-success" role="alert">
        Hi {{response.fname}}, {{msg}}
    </div>
</script>
