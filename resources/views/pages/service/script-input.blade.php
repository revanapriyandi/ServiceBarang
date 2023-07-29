   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   <script>
       $(document).ready(function() {
           var teknisiOptions = @json($teknisis);
           var barangOptions = @json($barangs);

           function toggleEditInput(element, isEditable, originalValue) {
               if (isEditable) {
                   var text = element.text().trim();
                   element.data('original', text); // Store the original value
                   var inputType = element.hasClass('select-edit') ? 'select' : 'input';
                   var inputElement;

                   if (inputType === 'select') {
                       var optionsData = element.hasClass('edit-teknisi') ? teknisiOptions : element.hasClass(
                           'edit-barang') ? barangOptions : [];
                       var selectOptions = optionsData.map(function(option) {
                           if (element.hasClass('edit-teknisi')) {
                               var selected = option.id == text ? 'selected' : '';
                               return `<option value="${option.id}" ${selected}>${option.name}</option>`;
                           } else if (element.hasClass('edit-barang')) {
                               var selected = option.uid == text ? 'selected' : '';
                               return `<option value="${option.uid}" ${selected}>${option.name}</option>`;
                           }
                       }).join('');

                       inputElement = $(`<select class="form-control form-control-sm">${selectOptions}</select>`);
                   } else {
                       inputElement = $(
                           `<input type="text" class="form-control form-control-sm" value="${text}">`);
                   }

                   element.empty().append(inputElement);
               } else {
                   var inputValue = originalValue || element.find('input, select').val();
                   element.empty().text(inputValue);
               }
           }

           function toggleButtons(row, isEditable) {
               row.find('.btn-edit').toggle(!isEditable);
               row.find('.btn-save, .btn-cancel').toggle(isEditable);
           }

           $(document).on('click', '.btn-edit', function() {
               var row = $(this).closest('tr');
               var isEditable = $(this).hasClass('btn-edit');

               ['teknisi', 'barang', 'id-order', 'msc-barang'].forEach(function(item) {
                   toggleEditInput(row.find(`.edit-${item}`), isEditable);
               });

               toggleButtons(row, isEditable);
           });

           $(document).on('click', '.btn-save', function() {
               var row = $(this).closest('tr');
               var id = row.data('id');

               var data = {
                   teknisi: row.find('.edit-teknisi').find('input, select').val(),
                   barang: row.find('.edit-barang').find('input, select').val(),
                   id_order: row.find('.edit-id-order').find('input, select').val(),
                   msc_barang: row.find('.edit-msc-barang').find('input, select').val(),
               };

               $.ajax({
                   url: '{{ route('update.temporary', 'idd') }}'.replace('idd', id),
                   method: 'POST',
                   data: {
                       id: id,
                       data: data,
                       _token: '{{ csrf_token() }}',
                   },
                   success: function(response) {
                       // console.log(response)
                       alert(response.message);
                       location.reload();
                   },
                   error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                       alert('Data gagal diubah, error: ' + textStatus + errorThrown +
                           '. Silahkan coba lagi')
                   }
               });
           });


           $(document).on('click', '.btn-cancel', function() {
               var row = $(this).closest('tr');

               ['teknisi', 'barang', 'id-order', 'msc-barang'].forEach(function(item) {
                   var element = row.find(`.edit-${item}`);
                   var originalValue = element.data('original');
                   toggleEditInput(element, false, originalValue);
               });

               toggleButtons(row, false);
           });

           $("select").select2({
               theme: "bootstrap4",
               className: "form-control form-control-sm text-center",
               placeholder: "Pilih",
           });

           function loadTeknisiData(teknisiId) {
               if (teknisiId) {
                   $.ajax({
                       url: "{{ route('getTeknisiData', 'idd') }}".replace('idd', teknisiId),
                       type: "GET",
                       success: function(data) {
                           $("#teknisiName").text(data.name);
                           $("#teknisiId").text(data.uid);
                           $("#statusTarget").text(data.status);
                           $("#point").text(data.point);
                       },
                       error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                       },
                   });
               } else {
                   $("#teknisiName").text("-");
                   $("#teknisiId").text("-");
                   $("#statusTarget").text("-");
                   $("#point").text("0");
               }
           }

           var selectedTeknisiId = $("#teknisi").val();
           loadTeknisiData(selectedTeknisiId);

           // Event listener untuk dropdown teknisi
           $("#teknisi").change(function() {
               var teknisiId = $(this).val();
               loadTeknisiData(teknisiId);
           });
       });

       new DataTable("#tableBarang");

       function selectBarang(uid, name) {
           $("#barang").val(uid);
       }

       $("#msc_barang").on("input", function() {
           $('#form').submit()
       });


       document.addEventListener("DOMContentLoaded", function() {
           const teknisiInput = document.getElementById("teknisi");
           const barangInput = document.getElementById("barang");
           const idOrderInput = document.getElementById("id_order");
           const inputButton = document.getElementById("btn-input");

           // Function to check if any of the input fields are empty
           function checkInputs() {
               const teknisiValue = teknisiInput.value;
               const barangValue = barangInput.value.trim();
               const idOrderValue = idOrderInput.value.trim();

               const anyInputIsEmpty = teknisiValue === "" || barangValue === "" || idOrderValue === "";
               inputButton.disabled = anyInputIsEmpty;
           }

           // Event listeners for input fields to call the checkInputs function
           teknisiInput.addEventListener("input", checkInputs);
           barangInput.addEventListener("input", checkInputs);
           idOrderInput.addEventListener("input", checkInputs);

       });
   </script>
