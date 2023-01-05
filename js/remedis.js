function source_gizi(num) {
    let arr = [
        {
            id : 1,
            name : "Tidak",
            value: 0
        },
        {
            id : 2,
            name : "Tidak yakin (ada tanda : baju menjadi longgar)",
            value: 2
        },
        {
            id : 3,
            name : "Penurunan Berat Badan Sebanyak 1-5 Kg",
            value: 1
        },
        {
            id : 4,
            name : "Penurunan Berat Badan Sebanyak 6-10 Kg",
            value: 2
        },
        {
            id : 5,
            name : "Penurunan Berat Badan Sebanyak 11-15 Kg",
            value: 3
        },
        {
            id : 6,
            name : "Penurunan Berat Badan Sebanyak >15 Kg",
            value: 4
        },
        {
            id : 7,
            name : "Tidak Tahu Berapa kg penurunannya",
            value: 2
        },
        {
            id : 8,
            name : "Tidak",
            value: 0
        },
        {
            id : 9,
            name : "Ya",
            value: 1
        },
        
    ];
    const search =   arr.find((data)=>data.id==num); 
    return search;
}