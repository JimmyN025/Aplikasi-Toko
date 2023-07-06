<div id="printable" class="container">
    <table border="0" cellpadding="0" cellspacing="0" width="485" class="border" style="overflow-x:auto;">
        <thead>
            <tr>
                <td colspan="6" width="485" id="caption"><h3>Victory Grace</h3></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td class="left kop">{{ date('d M Y') }}</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Barang</th>
                <th>TOTAL</th>
            </tr>

            @php
                $total=0;
            @endphp
            @foreach ($jual as $j)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $j->kode_barang }}</td>
                    <td>{{ $j->nama_barang }}</td>
                    <td>Rp. {{ number_format($j->harga_barang) }}</td>
                    <td>{{ $j->jumlah_barang }}</td>
                    <td>Rp. {{ number_format($j->total_harga) }}</td>
                    {{ $total += $j->total_harga }}
                    
                </tr>
            @endforeach
            

        
            <tr>
                <th colspan="5"> TOTAL</th>
                
                <td >Rp. {{ number_format($total) }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="ttd">
                <th colspan="2">Customer</th>
                <th colspan="2">Diterima</th>
                <th colspan="2">Mengetahui</th>
            </tr>
            <tr>
                <td colspan="2">__________________</td>
                <td colspan="2">__________________</td>
                <td colspan="2">__________________</td>
            </tr>
        </tfoot>
    </table>
</div>

<style>
    table {
        max-width: 100%;
        max-height: 100%;
    }

    body {
        padding: 5px;
        position: relative;
        width: 100%;
        height: 100%;
    }

    table th,
    table td {
        padding: .625em;
        text-align: center;
    }

    table .kop:before {
        content: ': ';
    }

    .left {
        text-align: left;
    }

    table #caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    table.border {
        width: 100%;
        border-collapse: collapse
    }

    table.border tbody th,
    table.border tbody td {
        border: thin solid #000;
        padding: 2px
    }

    .ttd td,
    .ttd th {
        padding-bottom: 4em;
    }
</style>


<script>
    var datetime = new Date().getDate();
    console.log(datetime); // it will represent date in the console of developers tool
    document.getElementById("date-time").textContent = datetime; //it will print on html page


    $('body').on('click', function() {
        //pop_print('printable');
        window.open(document.URL, 'printer');
    });

    function pop_print(id) {
        w = window.open('', 'Print_Page', 'scrollbars=yes');
        var myStyle = '<link rel="stylesheet" href="https://codepen.io/dimaslanjaka/pen/mozZPX.css?ver=' + window.btoa(
                Math.random()) +
            '" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css" media="all" />';
        w.document.write(myStyle + $('#' + id).html());
        w.document.close();
        w.print();
        w.close();
    }
</script>
