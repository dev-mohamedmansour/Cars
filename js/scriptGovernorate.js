// noinspection SpellCheckingInspection
const centersData = {
    Cairo: [
        "Dar El Salam", "El Basatin",
        "Maadi", "15 May City",
        "El Tibbin", "Al Maasara",
        "Helwan", "El Shorouk",
        "Badr City", "New Cairo",
        "Nasr City", "Heliopolis",
        "El Salam", "Ain Shams",
        "Masr El Qedima", "El Sayeda Zeinab",
        "El Khalifa"
    ],
    Giza: [
        "Warraq", "6th of October",
        "Sheikh Zayed,", "Ahram",
        "Imbaba", "Agouza",
        "Dokki", "Bulaq El Dakrour",
        "Omrania", "Salbeya"
    ],
    Alexandria: [
        "El Manshiyya", "El Montaza",
        "El Raml", "North Coast",
        "Bab Sharqi", "Borg El Arab",
        "Karmouz", "New Borg El Arab City",
        "Mina El Basal", "Moharam Bek",
        "Sidi Gaber", "Alexandria Port",
        "El Dekhela", "El Amreya",
        "El Gomrok", "El Labban",
    ],
    Aswan: [
        "Nasr", "New Tushka",
        "New Aswan", "Kom Ombo",
        "Edfu", "Daraw",
        "Aswan", "Abu Simbel"
    ],
    Luxor: [
        "Thebes (Tiba)", "Esna",
        "Armant", "Luxor",
        "Qurna"
    ],
    Dakahlia: [
        "Aga", "El Gamaliya",
        "El Kurdi", "El Mansoura",
        "El Manzala", "El Matareya",
        "El Senbellawein", "Beni Ebeid",
        "Belqas", "Dikirnis",
        "Gamasa", "Mit Ghamr",
        "Minyet El Nasr", "Maḥallat Damanah",
        "Talkha", "Shirbin"
    ],
    Sharqia: [
        "Abu Hammad", "Abu Kebir",
        "El Husseiniya", "El Ibrahimiya",
        "El Qurein", "10th of Ramadan",
        "Hihya", "Diyarb Negm",
        "Bilbeis", "Awlad Saqr",
        "Zagazig ", "Kafr Saqr",
        "Faqous", "Minya El Qamh",
    ],
    Sohag: [
        "El Munsha", "Aserat",
        "Juhaynah West", "Tima",
        "Tima", "Tahta",
        "Sohag", "New Sohag",
        "New Akhmim", "Girga",
        "El Maragha", "El Kawthar",
        "El Balyana", "Akhmim",
    ],
    Qena: [
        "Qus", "Qift",
        "Qena", "New Qena",
        "Naqada", "Nag Hammadi",
        "Farshut", "El Waqf",
        "Dishna", "Abu Tesht"
    ],
    BeniSufe: [
        "New Beni Suef", "Beni Suef",
        "Sumusta", "Biba",
        "El Fashn", "El Wasta",
        "Nasser", "Ihnasiya"
    ],
    Asyut: [
        "Abnub", "Abu Tig",
        "Sidfa", "Sahel Selim",
        "Manfalut", "New Asyut",
        "Asyut", "Dairut",
        "El Ghanayem", "El Qusiya",
        "El Badari", "El Fateh"
    ],
    Suez: [
        "Suez City", "Al-Arbaeen",
        "Al-Galala", "Ataqa",
        "Port Tawfiq", "Ras Sidr",
        "El-Zafarana", "Gebel Ataqa",
        "Adabiya", "Ain Sokhna"
    ],
    Fayoum: [
        "Fayoum City", "Ibshaway",
        "Tamia", "Youssef El-Seddik",
        "Al-Wasta", "Al-Nazla",
        "Zawyet El-Maya", "Senoura",
        "Sennuris"
    ],
    RedSea: [
        "Hurghada", "Ras Gharib",
        "Safaga", "El-Quseir",
        "Marsa Alam", "Shalateen",
        "Hala'ib", "Ras Shukheir",
        "Soma Bay", "Ain Sokhna"
    ],
    Minya: [
        "Minya City", "Bani Mazar",
        "Samalut", "Mallawi",
        "Abu Qurqas", "El-Edwa",
        "Maghagha", "Dairut",
        "Towa", "Maza"
    ],
    NorthSinai: [
        "Arish", "Rafah",
        "Sheikh Zuweid", "Al-Hasna",
        "Bir al-Abed", "Sheikh Zuweid",
        "Al-Qantara", "Al-Areesh"
    ],
    SouthSinai: [
        "Sharm El-Sheikh", "Dahab",
        "Nuweiba", "Taba",
        "Ras Mohamed", "Saint Catherine",
        "Nabq", "Abu Galum"
    ],
    PortSaid: [
        "Port Said City", "Port Fouad",
        "El-Manakh", "Al-Zahraa",
        "Al-Gomhouria", "Al-Aziziyah",
        "Al-Bahr"
    ],
};

// Find all card containers
const cardContainers = document.querySelectorAll(".hov.col-lg-4.wow.animate__slideInUp.card-update");

// Loop through each card container
cardContainers.forEach((div) => {
    const governorates = div.querySelector(".governorates");
    const centers = div.querySelector(".centers");
    const centerContainer = div.querySelector(".center-container");

    // Add event listener to each governorate dropdown
    governorates.addEventListener("change", () => {
        const selectedGovernorate = governorates.value;

        if (selectedGovernorate) {
            centerContainer.classList.remove("hidden");

            centers.innerHTML = '<option>-- Select Your Center --</option>';

            centersData[selectedGovernorate].forEach((center) => {
                const option = document.createElement("option");
                option.value = center;
                option.textContent = center;
                centers.appendChild(option);
            });
        } else {
            centerContainer.classList.add("hidden");
        }
    });
});