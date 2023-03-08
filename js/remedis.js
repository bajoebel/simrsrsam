function source_gizi(num) {
  let arr = [
    {
      id: 1,
      name: "Tidak",
      value: 0,
    },
    {
      id: 2,
      name: "Tidak yakin (ada tanda : baju menjadi longgar)",
      value: 2,
    },
    {
      id: 3,
      name: "Penurunan Berat Badan Sebanyak 1-5 Kg",
      value: 1,
    },
    {
      id: 4,
      name: "Penurunan Berat Badan Sebanyak 6-10 Kg",
      value: 2,
    },
    {
      id: 5,
      name: "Penurunan Berat Badan Sebanyak 11-15 Kg",
      value: 3,
    },
    {
      id: 6,
      name: "Penurunan Berat Badan Sebanyak >15 Kg",
      value: 4,
    },
    {
      id: 7,
      name: "Tidak Tahu Berapa kg penurunannya",
      value: 2,
    },
    {
      id: 8,
      name: "Tidak",
      value: 0,
    },
    {
      id: 9,
      name: "Ya",
      value: 1,
    },
  ];
  const search = arr.find((data) => data.id == num);
  return search;
}

function convertDateFromDBIndoFull(x) {
  let bulan = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ];

  let al = "";
  if (x == null || x == "" || x == "null") {
    al = "";
  } else {
    let tgl = x.split("-")[2];
    let bln = x.split("-")[1];
    let thn = x.split("-")[0];

    al = tgl + " " + bulan[Math.abs(bln) - 1] + " " + thn;
  }
  return al;
}

function status_erm(status) {
  if (status == 1) {
    return "<span class='badge bg-green'>Final</span>";
  } else if (status == 0) {
    return "<span class='badge bg-yellow'>Proses</span>";
  } else {
    return "-";
  }
}

function doAjax(data_form, url, method = "POST", datatype = "JSON") {
  return new Promise((resolve, reject) => {
    $.ajax({
      method: method,
      url: url,
      data: data_form,
      dataType: datatype,
      success: function (response) {
        resolve(response);
      },
      error: function (error) {
        reject(error);
      },
    });
  });
}
