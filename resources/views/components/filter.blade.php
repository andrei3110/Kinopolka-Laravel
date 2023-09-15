@props(['items', 'title'])

    <div class="w-56 inline-block">
        <div class="relative w-56 " onclick="showCheckboxes{{ $title }}()">
            <select class="w-56 bg-slate-200  text-gray-500 font-medium border-none text-center">
                <option class="w-full">{{ $title }}</option>
            </select>
            <div class="absolute left-0 right-0 top-0 bottom-0"></div>
        </div>
        <div class="hidden absolute  z-20 " id="checkboxes{{ $title }}">
            @foreach ($items as $item)
                <div class="block w-56 p-2 bg-white border-2 text-gray-500 font-medium">
                    <input type="checkbox" name="checkFilter_{{ $title }}[]" value="{{ $item->id }}"
                        id="one{{ $title }}" />
                    <label class="" for="one{{ $title }}">{{ $item->title }}</label>
                </div>
            @endforeach

        </div>
    </div>



<script>
    var expanded = false;

    function showCheckboxes{{ $title }}() {
        var checkboxes = document.getElementById("checkboxes{{ $title }}");
        
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
