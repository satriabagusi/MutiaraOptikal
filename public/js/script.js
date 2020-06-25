$('.toast').toast('show');

      $(document).ready(function(){
        // Format mata uang.
        $( '#price' ).mask('000.000.000', {reverse: true});
        $( '#lens_price' ).mask('000.000.000', {reverse: true});
        $( '#total_pay' ).mask('000.000.000', {reverse: true});
        $( '#remain' ).mask('000.000.000', {reverse: true});
        $( '#total' ).mask('000.000.000', {reverse: true});
        $( '#total_all' ).mask('000.000.000', {reverse: true});
        $( '#stock' ).mask('000.000', {reverse: true});
        $('#no_hp').mask('000000000000');
        $('#no_bpjs').mask('000000000000000');
        $('#no_bpjs_add').mask('000000000000000');
        


        //hidden input no_bpjs
        $("#no_bpjs").prop('hidden', true);
        $("#label_bpjs").prop("hidden", true);
        $("#note_bpjs").prop("hidden", true);
        
        $('input[type=radio]').click(function () {
            if($(this).prop('id') == "ya"){
              $("#no_bpjs").prop("hidden", false);
              $("#label_bpjs").prop("hidden", false);
              $("#note_bpjs").prop("hidden", false);
            }else{
              $("#no_bpjs").prop("hidden", true);
              $("#label_bpjs").prop("hidden", true);
              $("#note_bpjs").prop("hidden", true);

            }
          });

          $("#total_pay").keyup(function(){
            var total_pay = $("#total_pay").val().replace(/\./g, '');
            var total_transaction = $("#total_transaction").val().replace(/\./g, '');
            if(Number(total_pay) > Number(total_transaction)){
              $("#totalPay").show();
              $("#total_pay").addClass("is-invalid");
              $("btnSubmit").attr("disabled", "disabled");
              $("button[name='btnSubmit']").attr("disabled", "disabled").removeClass("btn-primary").addClass("btn-danger").button('refresh');
            }else{
              $("#totalPay").hide();
              $("#total_pay").removeClass("is-invalid");
              $("button[name='btnSubmit']").removeAttr("disabled").removeClass("btn-danger").addClass("btn-primary").button('refresh');
            }
          });
        });

      $("#id_pasien").change(function(){
        var id = $(this).val();
        var url = '/transaction/getPatients/:id';
        url = url.replace(':id', id);
        $.ajax({
          url: url,
          type: 'get',
          dataType: 'json',
          success: function(response){
              if(response != null){
                $('#no_hp').val(response.no_hp);
                $('#no_bpjs').val(response.no_bpjs);
                $('#nama_pasien').val(response.nama_pasien);
              }
          }
        });
      });

      $("#id_frame").change(function(){
        var id = $(this).val();
        var url = '/transaction/getFrames/:id';
        url = url.replace(':id', id);
        $.ajax({
          url: url,
          type: 'get',
          dataType: 'json',
          success: function(response){
              if(response != null){
                $('#frame_prices').val(response.price).mask('000.000.000', {reverse: true});;
                console.log(response);
              }
          }
        });
      });

      $("#lens_price").change(function(){
        var frame_price = $("#frame_prices").val().replace(/\./g, '');
        var lens_price = $("#lens_price").val().replace(/\./g, '');
        var total = parseInt(frame_price) + parseInt(lens_price);
        $("#total_transaction").val(total).mask('000.000.000', {reverse: true});
        console.log("total : "+ frame_price + " + " + lens_price + " = " + total);
      });

      $(document).ready(function () {
        $('.detail-data').click(function () {
            var transaction_id = $(this).attr("id");
            var url = '/transaction/detail/:id';
            url = url.replace(':id', transaction_id);
            $.ajax({
              url:url,
              method: "get",
              dataType: "json",
              success:function(data){
                console.log(data);
              }
              
            });
        });
      });

      $(document).ready(function () {

          $("#inputKonfirmasiPembayaran").keyup(function(){
            var konfirmasiBayar = $("#inputKonfirmasiPembayaran").val().replace(/\./g, '');
            var inputPembayaran = $("#inputPembayaran").val().replace(/\./g, '');
            if(Number(konfirmasiBayar) === Number(inputPembayaran)){
              $("#totalPay").hide();
              $("#inputKonfirmasiPembayaran").removeClass("is-invalid");
              $("button[name='btnSubmit']").removeAttr("disabled").button('refresh');
            }else{
              $("#totalPay").show();
              $("#inputKonfirmasiPembayaran").addClass("is-invalid");
              $("btnSubmit").attr("disabled", "disabled");
              $("button[name='btnSubmit']").attr("disabled", "disabled").button('refresh');
            }
          });


        $('.btn-repayment').click(function () {
          $("#card-detail").slideUp("fast");
          $("#loading-wait").hide();
          $("#loading-wait").show();

            var transaction_id = $('#id').val();
            var url = '/transaction/detail/repayment/:id';
            url = url.replace(':id', transaction_id);
            $.ajax({
              url:url,
              method: "get",
              dataType: "json",
              success:function(data){
                if(Object.keys(data).length === 0){
                  Swal.fire({
                    icon: 'error',
                    title: 'Transaksi tidak ditemukan!',
                    text: 'Nomor transaksi '+transaction_id+' tidak ditemukan, silahkan cek kembali!',
                  }),
                  $("#loading-wait").hide();
                }else{
                  // console.log(data);
                  console.log(data[0]);
                  $("#card-detail").slideDown("slow");
                  $("#id_transaksi").val(data[0].id)
                  $("#inputNama").val(data[0].patient.nama_pasien);
                  $("#inputNoHP").val(data[0].patient.no_hp);
                  $("#inputNoBPJS").val(data[0].patient.no_bpjs);
                  $("#inputJenisLensa").val(data[0].lens_type);
                  $("#inputHargaLensa").val(data[0].lens_price).mask('000.000.000', {reverse: true});
                  $("#inputTipeFrame").val(data[0].frame_type.frame_type);
                  $("#inputHargaFrame").val(data[0].frame_type.price).mask('000.000.000', {reverse: true});
                  $("#inputBayarAwal").val(data[0].total_pay).mask('000.000.000', {reverse: true});
                  $("#inputTotalTransaksi").val(data[0].total_transaction).mask('000.000.000', {reverse: true});
                  $("#inputPembayaran").val(data[0].total_transaction - data[0].total_pay).mask('000.000.000', {reverse: true});
                  $("#inputKonfirmasiPembayaran").mask('000.000.000', {reverse: true});
                  $("#loading-wait").hide();

                }
              }
            });
        });
      });

      function closeCard(){
        $("#card-detail").slideUp("slow");
      }