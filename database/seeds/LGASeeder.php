<?php

use App\State;
use App\Lga;
use Illuminate\Database\Seeder;

class LGASeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $lgas = [
            [
                "state_id" => 1,
                "name" => "Aba North"
            ],
            [
                "state_id" => 1,
                "name" => "Aba South"
            ],
            [
                "state_id" => 1,
                "name" => "Arochukwu"
            ],
            [
                "state_id" => 1,
                "name" => "Bende"
            ],
            [
                "state_id" => 1,
                "name" => "Ikwuano"
            ],
            [
                "state_id" => 1,
                "name" => "Isiala-Ngwa North"
            ],
            [
                "state_id" => 1,
                "name" => "Isiala-Ngwa South"
            ],
            [
                "state_id" => 1,
                "name" => "Isikwuato"
            ],
            [
                "state_id" => 1,
                "name" => "Nneochi"
            ],
            [
                "state_id" => 1,
                "name" => "Obi-Ngwa"
            ],
            [
                "state_id" => 1,
                "name" => "Ohafia"
            ],
            [
                "state_id" => 1,
                "name" => "Osisioma"
            ],
            [
                "state_id" => 1,
                "name" => "Ugwunagbo"
            ],
            [
                "state_id" => 1,
                "name" => "Ukwa East"
            ],
            [
                "state_id" => 1,
                "name" => "Ukwa West"
            ],
            [
                "state_id" => 1,
                "name" => "Umuahia North"
            ],
            [
                "state_id" => 1,
                "name" => "Umuahia South"
            ],
            [
                "state_id" => 2,
                "name" => "Demsa"
            ],
            [
                "state_id" => 2,
                "name" => "Fufore"
            ],
            [
                "state_id" => 2,
                "name" => "Genye"
            ],
            [
                "state_id" => 2,
                "name" => "Girei"
            ],
            [
                "state_id" => 2,
                "name" => "Gombi"
            ],
            [
                "state_id" => 2,
                "name" => "guyuk"
            ],
            [
                "state_id" => 2,
                "name" => "Hong"
            ],
            [
                "state_id" => 2,
                "name" => "Jada"
            ],
            [
                "state_id" => 2,
                "name" => "Jimeta"
            ],
            [
                "state_id" => 2,
                "name" => "Lamurde"
            ],
            [
                "state_id" => 2,
                "name" => "Madagali"
            ],
            [
                "state_id" => 2,
                "name" => "Maiha"
            ],
            [
                "state_id" => 2,
                "name" => "Mayo Belwa"
            ],
            [
                "state_id" => 2,
                "name" => "Michika"
            ],
            [
                "state_id" => 2,
                "name" => "Mubi North"
            ],
            [
                "state_id" => 2,
                "name" => "Mubi South"
            ],
            [
                "state_id" => 2,
                "name" => "Numan"
            ],
            [
                "state_id" => 2,
                "name" => "Shelleng"
            ],
            [
                "state_id" => 2,
                "name" => "Song"
            ],
            [
                "state_id" => 2,
                "name" => "Toungo"
            ],
            [
                "state_id" => 2,
                "name" => "Yola"
            ],
            [
                "state_id" => 3,
                "name" => "Abak"
            ],
            [
                "state_id" => 3,
                "name" => "Eastern-Obolo"
            ],
            [
                "state_id" => 3,
                "name" => "Eket"
            ],
            [
                "state_id" => 3,
                "name" => "Ekpe-Atani"
            ],
            [
                "state_id" => 3,
                "name" => "Essien-Udim"
            ],
            [
                "state_id" => 3,
                "name" => "Esit Ekit"
            ],
            [
                "state_id" => 3,
                "name" => "Etim-Ekpo"
            ],
            [
                "state_id" => 3,
                "name" => "Etinam"
            ],
            [
                "state_id" => 3,
                "name" => "Ibeno"
            ],
            [
                "state_id" => 3,
                "name" => "Ibesikp-Asitan"
            ],
            [
                "state_id" => 3,
                "name" => "Ibiono-Ibom"
            ],
            [
                "state_id" => 3,
                "name" => "Ika"
            ],
            [
                "state_id" => 3,
                "name" => "Ikono"
            ],
            [
                "state_id" => 3,
                "name" => "Ikot-Abasi"
            ],
            [
                "state_id" => 3,
                "name" => "Ikot-Ekpene"
            ],
            [
                "state_id" => 3,
                "name" => "Ini"
            ],
            [
                "state_id" => 3,
                "name" => "Itu"
            ],
            [
                "state_id" => 3,
                "name" => "Mbo"
            ],
            [
                "state_id" => 3,
                "name" => "Mkpae-Enin"
            ],
            [
                "state_id" => 3,
                "name" => "Nsit-Ibom"
            ],
            [
                "state_id" => 3,
                "name" => "Nsit-Ubium"
            ],
            [
                "state_id" => 3,
                "name" => "Obot-Akara"
            ],
            [
                "state_id" => 3,
                "name" => "Okobo"
            ],
            [
                "state_id" => 3,
                "name" => "Onna"
            ],
            [
                "state_id" => 3,
                "name" => "Oron"
            ],
            [
                "state_id" => 3,
                "name" => "Oro-Anam"
            ],
            [
                "state_id" => 3,
                "name" => "Udung-Uko"
            ],
            [
                "state_id" => 3,
                "name" => "Ukanefun"
            ],
            [
                "state_id" => 3,
                "name" => "Uru Offong Oruko"
            ],
            [
                "state_id" => 3,
                "name" => "Uruan"
            ],
            [
                "state_id" => 3,
                "name" => "Uquo Ibene"
            ],
            [
                "state_id" => 3,
                "name" => "Uyo"
            ],
            [
                "state_id" => 4,
                "name" => "Aguata"
            ],
            [
                "state_id" => 4,
                "name" => "Anambra"
            ],
            [
                "state_id" => 4,
                "name" => "Anambra West"
            ],
            [
                "state_id" => 4,
                "name" => "Anocha"
            ],
            [
                "state_id" => 4,
                "name" => "Awka- North"
            ],
            [
                "state_id" => 4,
                "name" => "Awka-South"
            ],
            [
                "state_id" => 4,
                "name" => "Ayamelum"
            ],
            [
                "state_id" => 4,
                "name" => "Dunukofia"
            ],
            [
                "state_id" => 4,
                "name" => "Ekwusigo"
            ],
            [
                "state_id" => 4,
                "name" => "Idemili-North"
            ],
            [
                "state_id" => 4,
                "name" => "Idemili-South"
            ],
            [
                "state_id" => 4,
                "name" => "Ihiala"
            ],
            [
                "state_id" => 4,
                "name" => "Njikoka"
            ],
            [
                "state_id" => 4,
                "name" => "Nnewi-North"
            ],
            [
                "state_id" => 4,
                "name" => "Nnewi-South"
            ],
            [
                "state_id" => 4,
                "name" => "Ogbaru"
            ],
            [
                "state_id" => 4,
                "name" => "Onisha North"
            ],
            [
                "state_id" => 4,
                "name" => "Onitsha South"
            ],
            [
                "state_id" => 4,
                "name" => "Orumba North"
            ],
            [
                "state_id" => 4,
                "name" => "Orumba South"
            ],
            [
                "state_id" => 4,
                "name" => "Oyi"
            ],
            [
                "state_id" => 5,
                "name" => "Alkaleri"
            ],
            [
                "state_id" => 5,
                "name" => "Bauchi"
            ],
            [
                "state_id" => 5,
                "name" => "Bogoro"
            ],
            [
                "state_id" => 5,
                "name" => "Damban"
            ],
            [
                "state_id" => 5,
                "name" => "Darazo"
            ],
            [
                "state_id" => 5,
                "name" => "Dass"
            ],
            [
                "state_id" => 5,
                "name" => "Gamawa"
            ],
            [
                "state_id" => 5,
                "name" => "Ganjuwa"
            ],
            [
                "state_id" => 5,
                "name" => "Giade"
            ],
            [
                "state_id" => 5,
                "name" => "Itas/Gadau"
            ],
            [
                "state_id" => 5,
                "name" => "Jama'are"
            ],
            [
                "state_id" => 5,
                "name" => "Katagum"
            ],
            [
                "state_id" => 5,
                "name" => "Kirfi"
            ],
            [
                "state_id" => 5,
                "name" => "Misau"
            ],
            [
                "state_id" => 5,
                "name" => "Ningi"
            ],
            [
                "state_id" => 5,
                "name" => "Shira"
            ],
            [
                "state_id" => 5,
                "name" => "Tafawa-Balewa"
            ],
            [
                "state_id" => 5,
                "name" => "Toro"
            ],
            [
                "state_id" => 5,
                "name" => "Warji"
            ],
            [
                "state_id" => 5,
                "name" => "Zaki"
            ],
            [
                "state_id" => 6,
                "name" => "Brass"
            ],
            [
                "state_id" => 6,
                "name" => "Ekerernor"
            ],
            [
                "state_id" => 6,
                "name" => "Kolokuma/Opokuma"
            ],
            [
                "state_id" => 6,
                "name" => "Nembe"
            ],
            [
                "state_id" => 6,
                "name" => "Ogbia"
            ],
            [
                "state_id" => 6,
                "name" => "Sagbama"
            ],
            [
                "state_id" => 6,
                "name" => "Southern-Ijaw"
            ],
            [
                "state_id" => 6,
                "name" => "Yenegoa"
            ],
            [
                "state_id" => 6,
                "name" => "Kembe"
            ],
            [
                "state_id" => 7,
                "name" => "Ado"
            ],
            [
                "state_id" => 7,
                "name" => "Agatu"
            ],
            [
                "state_id" => 7,
                "name" => "Apa"
            ],
            [
                "state_id" => 7,
                "name" => "Buruku"
            ],
            [
                "state_id" => 7,
                "name" => "Gboko"
            ],
            [
                "state_id" => 7,
                "name" => "Guma"
            ],
            [
                "state_id" => 7,
                "name" => "Gwer-East"
            ],
            [
                "state_id" => 7,
                "name" => "Gwer-West"
            ],
            [
                "state_id" => 7,
                "name" => "Katsina-Ala"
            ],
            [
                "state_id" => 7,
                "name" => "Konshisha"
            ],
            [
                "state_id" => 7,
                "name" => "Kwande"
            ],
            [
                "state_id" => 7,
                "name" => "Logo"
            ],
            [
                "state_id" => 7,
                "name" => "Makurdi"
            ],
            [
                "state_id" => 7,
                "name" => "Obi"
            ],
            [
                "state_id" => 7,
                "name" => "Ogbadibo"
            ],
            [
                "state_id" => 7,
                "name" => "Ohimini"
            ],
            [
                "state_id" => 7,
                "name" => "Oju"
            ],
            [
                "state_id" => 7,
                "name" => "Okpokwu"
            ],
            [
                "state_id" => 7,
                "name" => "Otukpo"
            ],
            [
                "state_id" => 7,
                "name" => "Tarkar"
            ],
            [
                "state_id" => 7,
                "name" => "Vandeikya"
            ],
            [
                "state_id" => 7,
                "name" => "Ukum"
            ],
            [
                "state_id" => 7,
                "name" => "Ushongo"
            ],
            [
                "state_id" => 8,
                "name" => "Abadan"
            ],
            [
                "state_id" => 8,
                "name" => "Askira-Uba"
            ],
            [
                "state_id" => 8,
                "name" => "Bama"
            ],
            [
                "state_id" => 8,
                "name" => "Bayo"
            ],
            [
                "state_id" => 8,
                "name" => "Biu"
            ],
            [
                "state_id" => 8,
                "name" => "Chibok"
            ],
            [
                "state_id" => 8,
                "name" => "Damboa"
            ],
            [
                "state_id" => 8,
                "name" => "Dikwa"
            ],
            [
                "state_id" => 8,
                "name" => "Gubio"
            ],
            [
                "state_id" => 8,
                "name" => "Guzamala"
            ],
            [
                "state_id" => 8,
                "name" => "Gwoza"
            ],
            [
                "state_id" => 8,
                "name" => "Hawul"
            ],
            [
                "state_id" => 8,
                "name" => "Jere"
            ],
            [
                "state_id" => 8,
                "name" => "Kaga"
            ],
            [
                "state_id" => 8,
                "name" => "Kala/Balge"
            ],
            [
                "state_id" => 8,
                "name" => "Kukawa"
            ],
            [
                "state_id" => 8,
                "name" => "Konduga"
            ],
            [
                "state_id" => 8,
                "name" => "Kwaya-Kusar"
            ],
            [
                "state_id" => 8,
                "name" => "Mafa"
            ],
            [
                "state_id" => 8,
                "name" => "Magumeri"
            ],
            [
                "state_id" => 8,
                "name" => "Maiduguri"
            ],
            [
                "state_id" => 8,
                "name" => "Marte"
            ],
            [
                "state_id" => 8,
                "name" => "Mobbar"
            ],
            [
                "state_id" => 8,
                "name" => "Monguno"
            ],
            [
                "state_id" => 8,
                "name" => "Ngala"
            ],
            [
                "state_id" => 8,
                "name" => "Nganzai"
            ],
            [
                "state_id" => 8,
                "name" => "Shani"
            ],
            [
                "state_id" => 9,
                "name" => "Abi"
            ],
            [
                "state_id" => 9,
                "name" => "Akamkpa"
            ],
            [
                "state_id" => 9,
                "name" => "Akpabuyo"
            ],
            [
                "state_id" => 9,
                "name" => "Bakassi"
            ],
            [
                "state_id" => 9,
                "name" => "Bekwara"
            ],
            [
                "state_id" => 9,
                "name" => "Biasi"
            ],
            [
                "state_id" => 9,
                "name" => "Boki"
            ],
            [
                "state_id" => 9,
                "name" => "Calabar-Municipal"
            ],
            [
                "state_id" => 9,
                "name" => "Calabar-South"
            ],
            [
                "state_id" => 9,
                "name" => "Etunk"
            ],
            [
                "state_id" => 9,
                "name" => "Ikom"
            ],
            [
                "state_id" => 9,
                "name" => "Obantiku"
            ],
            [
                "state_id" => 9,
                "name" => "Ogoja"
            ],
            [
                "state_id" => 9,
                "name" => "Ugep North"
            ],
            [
                "state_id" => 9,
                "name" => "Yakurr"
            ],
            [
                "state_id" => 9,
                "name" => "Yala"
            ],
            [
                "state_id" => 10,
                "name" => "Aniocha North"
            ],
            [
                "state_id" => 10,
                "name" => "Aniocha South"
            ],
            [
                "state_id" => 10,
                "name" => "Bomadi"
            ],
            [
                "state_id" => 10,
                "name" => "Burutu"
            ],
            [
                "state_id" => 10,
                "name" => "Ethiope East"
            ],
            [
                "state_id" => 10,
                "name" => "Ethiope West"
            ],
            [
                "state_id" => 10,
                "name" => "Ika North East"
            ],
            [
                "state_id" => 10,
                "name" => "Ika South"
            ],
            [
                "state_id" => 10,
                "name" => "Isoko North"
            ],
            [
                "state_id" => 10,
                "name" => "Isoko South"
            ],
            [
                "state_id" => 10,
                "name" => "Ndokwa East"
            ],
            [
                "state_id" => 10,
                "name" => "Ndokwa West"
            ],
            [
                "state_id" => 10,
                "name" => "Okpe"
            ],
            [
                "state_id" => 10,
                "name" => "Oshimili North"
            ],
            [
                "state_id" => 10,
                "name" => "Oshimili South"
            ],
            [
                "state_id" => 10,
                "name" => "Patani"
            ],
            [
                "state_id" => 10,
                "name" => "Sapele"
            ],
            [
                "state_id" => 10,
                "name" => "Udu"
            ],
            [
                "state_id" => 10,
                "name" => "Ughilli North"
            ],
            [
                "state_id" => 10,
                "name" => "Ughilli South"
            ],
            [
                "state_id" => 10,
                "name" => "Ukwuani"
            ],
            [
                "state_id" => 10,
                "name" => "Uvwie"
            ],
            [
                "state_id" => 10,
                "name" => "Warri Central"
            ],
            [
                "state_id" => 10,
                "name" => "Warri North"
            ],
            [
                "state_id" => 10,
                "name" => "Warri South"
            ],
            [
                "state_id" => 11,
                "name" => "Abakaliki"
            ],
            [
                "state_id" => 11,
                "name" => "Ofikpo North"
            ],
            [
                "state_id" => 11,
                "name" => "Ofikpo South"
            ],
            [
                "state_id" => 11,
                "name" => "Ebonyi"
            ],
            [
                "state_id" => 11,
                "name" => "Ezza North"
            ],
            [
                "state_id" => 11,
                "name" => "Ezza South"
            ],
            [
                "state_id" => 11,
                "name" => "ikwo"
            ],
            [
                "state_id" => 11,
                "name" => "Ishielu"
            ],
            [
                "state_id" => 11,
                "name" => "Ivo"
            ],
            [
                "state_id" => 11,
                "name" => "Izzi"
            ],
            [
                "state_id" => 11,
                "name" => "Ohaukwu"
            ],
            [
                "state_id" => 11,
                "name" => "Ohaozara"
            ],
            [
                "state_id" => 11,
                "name" => "Onicha"
            ],
            [
                "state_id" => 12,
                "name" => "Akoko Edo"
            ],
            [
                "state_id" => 12,
                "name" => "Egor"
            ],
            [
                "state_id" => 12,
                "name" => "Esan Central"
            ],
            [
                "state_id" => 12,
                "name" => "Esan North East"
            ],
            [
                "state_id" => 12,
                "name" => "Esan South East"
            ],
            [
                "state_id" => 12,
                "name" => "Esan West"
            ],
            [
                "state_id" => 12,
                "name" => "Etsako-Central"
            ],
            [
                "state_id" => 12,
                "name" => "Etsako-West"
            ],
            [
                "state_id" => 12,
                "name" => "Igueben"
            ],
            [
                "state_id" => 12,
                "name" => "Ikpoba-Okha"
            ],
            [
                "state_id" => 12,
                "name" => "Oredo"
            ],
            [
                "state_id" => 12,
                "name" => "Orhionmwon"
            ],
            [
                "state_id" => 12,
                "name" => "Ovia North East"
            ],
            [
                "state_id" => 12,
                "name" => "Ovia South West"
            ],
            [
                "state_id" => 12,
                "name" => "owan east"
            ],
            [
                "state_id" => 12,
                "name" => "Owan West"
            ],
            [
                "state_id" => 12,
                "name" => "Umunniwonde"
            ],
            [
                "state_id" => 13,
                "name" => "Ado Ekiti"
            ],
            [
                "state_id" => 13,
                "name" => "Aiyedire"
            ],
            [
                "state_id" => 13,
                "name" => "Efon"
            ],
            [
                "state_id" => 13,
                "name" => "Ekiti-East"
            ],
            [
                "state_id" => 13,
                "name" => "Ekiti-South West"
            ],
            [
                "state_id" => 13,
                "name" => "Ekiti West"
            ],
            [
                "state_id" => 13,
                "name" => "Emure"
            ],
            [
                "state_id" => 13,
                "name" => "Ido Osi"
            ],
            [
                "state_id" => 13,
                "name" => "Ijero"
            ],
            [
                "state_id" => 13,
                "name" => "Ikere"
            ],
            [
                "state_id" => 13,
                "name" => "Ikole"
            ],
            [
                "state_id" => 13,
                "name" => "Ilejemeta"
            ],
            [
                "state_id" => 13,
                "name" => "Irepodun/Ifelodun"
            ],
            [
                "state_id" => 13,
                "name" => "Ise Orun"
            ],
            [
                "state_id" => 13,
                "name" => "Moba"
            ],
            [
                "state_id" => 13,
                "name" => "Oye"
            ],
            [
                "state_id" => 14,
                "name" => "Aninri"
            ],
            [
                "state_id" => 14,
                "name" => "Awgu"
            ],
            [
                "state_id" => 14,
                "name" => "Enugu East"
            ],
            [
                "state_id" => 14,
                "name" => "Enugu North"
            ],
            [
                "state_id" => 14,
                "name" => "Enugu South"
            ],
            [
                "state_id" => 14,
                "name" => "Ezeagu"
            ],
            [
                "state_id" => 14,
                "name" => "Igbo Etiti"
            ],
            [
                "state_id" => 14,
                "name" => "Igbo Eze North"
            ],
            [
                "state_id" => 14,
                "name" => "Igbo Eze South"
            ],
            [
                "state_id" => 14,
                "name" => "Isi Uzo"
            ],
            [
                "state_id" => 14,
                "name" => "Nkanu East"
            ],
            [
                "state_id" => 14,
                "name" => "Nkanu West"
            ],
            [
                "state_id" => 14,
                "name" => "Nsukka"
            ],
            [
                "state_id" => 14,
                "name" => "Oji-River"
            ],
            [
                "state_id" => 14,
                "name" => "Udenu"
            ],
            [
                "state_id" => 14,
                "name" => "Udi"
            ],
            [
                "state_id" => 14,
                "name" => "Uzo Uwani"
            ],
            [
                "state_id" => 15,
                "name" => "Akko"
            ],
            [
                "state_id" => 15,
                "name" => "Balanga"
            ],
            [
                "state_id" => 15,
                "name" => "Billiri"
            ],
            [
                "state_id" => 15,
                "name" => "Dukku"
            ],
            [
                "state_id" => 15,
                "name" => "Funakaye"
            ],
            [
                "state_id" => 15,
                "name" => "Gombe"
            ],
            [
                "state_id" => 15,
                "name" => "Kaltungo"
            ],
            [
                "state_id" => 15,
                "name" => "Kwami"
            ],
            [
                "state_id" => 15,
                "name" => "Nafada/Bajoga"
            ],
            [
                "state_id" => 15,
                "name" => "Shomgom"
            ],
            [
                "state_id" => 15,
                "name" => "Yamltu/Deba"
            ],
            [
                "state_id" => 16,
                "name" => "Ahiazu-Mbaise"
            ],
            [
                "state_id" => 16,
                "name" => "Ehime-Mbano"
            ],
            [
                "state_id" => 16,
                "name" => "Ezinihtte"
            ],
            [
                "state_id" => 16,
                "name" => "Ideato North"
            ],
            [
                "state_id" => 16,
                "name" => "Ideato South"
            ],
            [
                "state_id" => 16,
                "name" => "Ihitte/Uboma"
            ],
            [
                "state_id" => 16,
                "name" => "Ikeduru"
            ],
            [
                "state_id" => 16,
                "name" => "Isiala-Mbano"
            ],
            [
                "state_id" => 16,
                "name" => "Isu"
            ],
            [
                "state_id" => 16,
                "name" => "Mbaitoli"
            ],
            [
                "state_id" => 16,
                "name" => "Ngor-Okpala"
            ],
            [
                "state_id" => 16,
                "name" => "Njaba"
            ],
            [
                "state_id" => 16,
                "name" => "Nkwerre"
            ],
            [
                "state_id" => 16,
                "name" => "Nwangele"
            ],
            [
                "state_id" => 16,
                "name" => "obowo"
            ],
            [
                "state_id" => 16,
                "name" => "Oguta"
            ],
            [
                "state_id" => 16,
                "name" => "Ohaji-Eggema"
            ],
            [
                "state_id" => 16,
                "name" => "Okigwe"
            ],
            [
                "state_id" => 16,
                "name" => "Onuimo"
            ],
            [
                "state_id" => 16,
                "name" => "Orlu"
            ],
            [
                "state_id" => 16,
                "name" => "Orsu"
            ],
            [
                "state_id" => 16,
                "name" => "Oru East"
            ],
            [
                "state_id" => 16,
                "name" => "Oru West"
            ],
            [
                "state_id" => 16,
                "name" => "Owerri Municipal"
            ],
            [
                "state_id" => 16,
                "name" => "Owerri North"
            ],
            [
                "state_id" => 16,
                "name" => "Owerri West"
            ],
            [
                "state_id" => 17,
                "name" => "Auyu"
            ],
            [
                "state_id" => 17,
                "name" => "Babura"
            ],
            [
                "state_id" => 17,
                "name" => "Birnin Kudu"
            ],
            [
                "state_id" => 17,
                "name" => "Birniwa"
            ],
            [
                "state_id" => 17,
                "name" => "Bosuwa"
            ],
            [
                "state_id" => 17,
                "name" => "Buji"
            ],
            [
                "state_id" => 17,
                "name" => "Dutse"
            ],
            [
                "state_id" => 17,
                "name" => "Gagarawa"
            ],
            [
                "state_id" => 17,
                "name" => "Garki"
            ],
            [
                "state_id" => 17,
                "name" => "Gumel"
            ],
            [
                "state_id" => 17,
                "name" => "Guri"
            ],
            [
                "state_id" => 17,
                "name" => "Gwaram"
            ],
            [
                "state_id" => 17,
                "name" => "Gwiwa"
            ],
            [
                "state_id" => 17,
                "name" => "Hadejia"
            ],
            [
                "state_id" => 17,
                "name" => "Jahun"
            ],
            [
                "state_id" => 17,
                "name" => "Kafin Hausa"
            ],
            [
                "state_id" => 17,
                "name" => "Kaugama"
            ],
            [
                "state_id" => 17,
                "name" => "Kazaure"
            ],
            [
                "state_id" => 17,
                "name" => "Kirikasanuma"
            ],
            [
                "state_id" => 17,
                "name" => "Kiyawa"
            ],
            [
                "state_id" => 17,
                "name" => "Maigatari"
            ],
            [
                "state_id" => 17,
                "name" => "Malam Maduri"
            ],
            [
                "state_id" => 17,
                "name" => "Miga"
            ],
            [
                "state_id" => 17,
                "name" => "Ringim"
            ],
            [
                "state_id" => 17,
                "name" => "Roni"
            ],
            [
                "state_id" => 17,
                "name" => "Sule Tankarkar"
            ],
            [
                "state_id" => 17,
                "name" => "Taura"
            ],
            [
                "state_id" => 17,
                "name" => "Yankwashi"
            ],
            [
                "state_id" => 18,
                "name" => "Birnin-Gwari"
            ],
            [
                "state_id" => 18,
                "name" => "Chikun"
            ],
            [
                "state_id" => 18,
                "name" => "Giwa"
            ],
            [
                "state_id" => 18,
                "name" => "Gwagwada"
            ],
            [
                "state_id" => 18,
                "name" => "Igabi"
            ],
            [
                "state_id" => 18,
                "name" => "Ikara"
            ],
            [
                "state_id" => 18,
                "name" => "Jaba"
            ],
            [
                "state_id" => 18,
                "name" => "Jema'a"
            ],
            [
                "state_id" => 18,
                "name" => "Kachia"
            ],
            [
                "state_id" => 18,
                "name" => "Kaduna North"
            ],
            [
                "state_id" => 18,
                "name" => "Kagarko"
            ],
            [
                "state_id" => 18,
                "name" => "Kajuru"
            ],
            [
                "state_id" => 18,
                "name" => "Kaura"
            ],
            [
                "state_id" => 18,
                "name" => "Kauru"
            ],
            [
                "state_id" => 18,
                "name" => "Koka/Kawo"
            ],
            [
                "state_id" => 18,
                "name" => "Kubah"
            ],
            [
                "state_id" => 18,
                "name" => "Kudan"
            ],
            [
                "state_id" => 18,
                "name" => "Lere"
            ],
            [
                "state_id" => 18,
                "name" => "Makarfi"
            ],
            [
                "state_id" => 18,
                "name" => "Sabon Gari"
            ],
            [
                "state_id" => 18,
                "name" => "Sanga"
            ],
            [
                "state_id" => 18,
                "name" => "Sabo"
            ],
            [
                "state_id" => 18,
                "name" => "Tudun-Wada/Makera"
            ],
            [
                "state_id" => 18,
                "name" => "Zango-Kataf"
            ],
            [
                "state_id" => 18,
                "name" => "Zaria"
            ],
            [
                "state_id" => 19,
                "name" => "Ajingi"
            ],
            [
                "state_id" => 19,
                "name" => " Albasu"
            ],
            [
                "state_id" => 19,
                "name" => "Bagwai"
            ],
            [
                "state_id" => 19,
                "name" => "Bebeji"
            ],
            [
                "state_id" => 19,
                "name" => "Bichi"
            ],
            [
                "state_id" => 19,
                "name" => "Bunkure"
            ],
            [
                "state_id" => 19,
                "name" => "Dala"
            ],
            [
                "state_id" => 19,
                "name" => "Dambatta"
            ],
            [
                "state_id" => 19,
                "name" => "Dawakin Kudu"
            ],
            [
                "state_id" => 19,
                "name" => "Dawakin Tofa"
            ],
            [
                "state_id" => 19,
                "name" => "Doguwa"
            ],
            [
                "state_id" => 19,
                "name" => "Fagge"
            ],
            [
                "state_id" => 19,
                "name" => "Gabasawa"
            ],
            [
                "state_id" => 19,
                "name" => "Garko"
            ],
            [
                "state_id" => 19,
                "name" => "Garun-Mallam"
            ],
            [
                "state_id" => 19,
                "name" => "Gaya"
            ],
            [
                "state_id" => 19,
                "name" => "Gezawa"
            ],
            [
                "state_id" => 19,
                "name" => "Gwale"
            ],
            [
                "state_id" => 19,
                "name" => "Gwarzo"
            ],
            [
                "state_id" => 19,
                "name" => "Kabo"
            ],
            [
                "state_id" => 19,
                "name" => "Kano Municipal"
            ],
            [
                "state_id" => 19,
                "name" => "Karaye"
            ],
            [
                "state_id" => 19,
                "name" => "Kibiya"
            ],
            [
                "state_id" => 19,
                "name" => "Kiru"
            ],
            [
                "state_id" => 19,
                "name" => "Kumbotso"
            ],
            [
                "state_id" => 19,
                "name" => "Kunchi"
            ],
            [
                "state_id" => 19,
                "name" => "Kura"
            ],
            [
                "state_id" => 19,
                "name" => "Madobi"
            ],
            [
                "state_id" => 19,
                "name" => "Makoda"
            ],
            [
                "state_id" => 19,
                "name" => "Minjibir"
            ],
            [
                "state_id" => 19,
                "name" => "Nasarawa"
            ],
            [
                "state_id" => 19,
                "name" => "Rano"
            ],
            [
                "state_id" => 19,
                "name" => "Rimin Gado"
            ],
            [
                "state_id" => 19,
                "name" => "Rogo"
            ],
            [
                "state_id" => 19,
                "name" => "Shanono"
            ],
            [
                "state_id" => 19,
                "name" => "Sumaila"
            ],
            [
                "state_id" => 19,
                "name" => "Takai"
            ],
            [
                "state_id" => 19,
                "name" => "Tarauni"
            ],
            [
                "state_id" => 19,
                "name" => "Tofa"
            ],
            [
                "state_id" => 19,
                "name" => "Tsanyawa"
            ],
            [
                "state_id" => 19,
                "name" => "Tudun Wada"
            ],
            [
                "state_id" => 19,
                "name" => "Ngogo"
            ],
            [
                "state_id" => 19,
                "name" => "Warawa"
            ],
            [
                "state_id" => 19,
                "name" => "Wudil"
            ],
            [
                "state_id" => 20,
                "name" => "Bakori"
            ],
            [
                "state_id" => 20,
                "name" => "Batagarawa"
            ],
            [
                "state_id" => 20,
                "name" => "Batsari"
            ],
            [
                "state_id" => 20,
                "name" => "Baure"
            ],
            [
                "state_id" => 20,
                "name" => "Bindawa"
            ],
            [
                "state_id" => 20,
                "name" => "Charanchi"
            ],
            [
                "state_id" => 20,
                "name" => "Danja"
            ],
            [
                "state_id" => 20,
                "name" => "Danjume"
            ],
            [
                "state_id" => 20,
                "name" => "Dan-Musa"
            ],
            [
                "state_id" => 20,
                "name" => "Daura"
            ],
            [
                "state_id" => 20,
                "name" => "Dutsi"
            ],
            [
                "state_id" => 20,
                "name" => "Dutsinma"
            ],
            [
                "state_id" => 20,
                "name" => "Faskari"
            ],
            [
                "state_id" => 20,
                "name" => "Funtua"
            ],
            [
                "state_id" => 20,
                "name" => "Ingara"
            ],
            [
                "state_id" => 20,
                "name" => "Jibia"
            ],
            [
                "state_id" => 20,
                "name" => "Kafur"
            ],
            [
                "state_id" => 20,
                "name" => "Kaita"
            ],
            [
                "state_id" => 20,
                "name" => "Kankara"
            ],
            [
                "state_id" => 20,
                "name" => "Kankia"
            ],
            [
                "state_id" => 20,
                "name" => "Katsina"
            ],
            [
                "state_id" => 20,
                "name" => "Kurfi"
            ],
            [
                "state_id" => 20,
                "name" => "Kusada"
            ],
            [
                "state_id" => 20,
                "name" => "Mai Adua"
            ],
            [
                "state_id" => 20,
                "name" => "Malumfashi"
            ],
            [
                "state_id" => 20,
                "name" => "Mani"
            ],
            [
                "state_id" => 20,
                "name" => "Mashi"
            ],
            [
                "state_id" => 20,
                "name" => "Matazu"
            ],
            [
                "state_id" => 20,
                "name" => "Musawa"
            ],
            [
                "state_id" => 20,
                "name" => "Rimi"
            ],
            [
                "state_id" => 20,
                "name" => "Sabuwa"
            ],
            [
                "state_id" => 20,
                "name" => "Safana"
            ],
            [
                "state_id" => 20,
                "name" => "Sandamu"
            ],
            [
                "state_id" => 20,
                "name" => "Zango"
            ],
            [
                "state_id" => 21,
                "name" => "Aleira"
            ],
            [
                "state_id" => 21,
                "name" => "Arewa"
            ],
            [
                "state_id" => 21,
                "name" => "Argungu"
            ],
            [
                "state_id" => 21,
                "name" => "Augie"
            ],
            [
                "state_id" => 21,
                "name" => "Bagudo"
            ],
            [
                "state_id" => 21,
                "name" => "Birnin-Kebbi"
            ],
            [
                "state_id" => 21,
                "name" => "Bumza"
            ],
            [
                "state_id" => 21,
                "name" => "Dandi"
            ],
            [
                "state_id" => 21,
                "name" => "Danko"
            ],
            [
                "state_id" => 21,
                "name" => "Fakai"
            ],
            [
                "state_id" => 21,
                "name" => "Gwandu"
            ],
            [
                "state_id" => 21,
                "name" => "Jega"
            ],
            [
                "state_id" => 21,
                "name" => "Kalgo"
            ],
            [
                "state_id" => 21,
                "name" => "Koko-Besse"
            ],
            [
                "state_id" => 21,
                "name" => "Maiyama"
            ],
            [
                "state_id" => 21,
                "name" => "Ngaski"
            ],
            [
                "state_id" => 21,
                "name" => "Sakaba"
            ],
            [
                "state_id" => 21,
                "name" => "Shanga"
            ],
            [
                "state_id" => 21,
                "name" => "Suru"
            ],
            [
                "state_id" => 21,
                "name" => "Wasagu"
            ],
            [
                "state_id" => 21,
                "name" => "Yauri"
            ],
            [
                "state_id" => 21,
                "name" => "Zuru"
            ],
            [
                "state_id" => 22,
                "name" => "Adavi"
            ],
            [
                "state_id" => 22,
                "name" => "Ajaokuta"
            ],
            [
                "state_id" => 22,
                "name" => "Ankpa"
            ],
            [
                "state_id" => 22,
                "name" => "Bassa"
            ],
            [
                "state_id" => 22,
                "name" => "Dekina"
            ],
            [
                "state_id" => 22,
                "name" => "Ibaji"
            ],
            [
                "state_id" => 22,
                "name" => "Idah"
            ],
            [
                "state_id" => 22,
                "name" => "Igalamela"
            ],
            [
                "state_id" => 22,
                "name" => "Ijumu"
            ],
            [
                "state_id" => 22,
                "name" => "Kabba/Bunu"
            ],
            [
                "state_id" => 22,
                "name" => "Kogi"
            ],
            [
                "state_id" => 22,
                "name" => "Lokoja"
            ],
            [
                "state_id" => 22,
                "name" => "Mopa-Muro-Mopi"
            ],
            [
                "state_id" => 22,
                "name" => "Ofu"
            ],
            [
                "state_id" => 22,
                "name" => "Ogori/Magongo"
            ],
            [
                "state_id" => 22,
                "name" => "Okehi"
            ],
            [
                "state_id" => 22,
                "name" => "Okene"
            ],
            [
                "state_id" => 22,
                "name" => "Olamaboro"
            ],
            [
                "state_id" => 22,
                "name" => "Omala"
            ],
            [
                "state_id" => 22,
                "name" => "Oyi"
            ],
            [
                "state_id" => 22,
                "name" => "Yagba-East"
            ],
            [
                "state_id" => 22,
                "name" => "Yagba-West"
            ],
            [
                "state_id" => 23,
                "name" => "Asa"
            ],
            [
                "state_id" => 23,
                "name" => "Baruten"
            ],
            [
                "state_id" => 23,
                "name" => "Edu"
            ],
            [
                "state_id" => 23,
                "name" => "Ekiti"
            ],
            [
                "state_id" => 23,
                "name" => "Ifelodun"
            ],
            [
                "state_id" => 23,
                "name" => "Ilorin East"
            ],
            [
                "state_id" => 23,
                "name" => "Ilorin South"
            ],
            [
                "state_id" => 23,
                "name" => "Ilorin West"
            ],
            [
                "state_id" => 23,
                "name" => "Irepodun"
            ],
            [
                "state_id" => 23,
                "name" => "Isin"
            ],
            [
                "state_id" => 23,
                "name" => "Kaiama"
            ],
            [
                "state_id" => 23,
                "name" => "Moro"
            ],
            [
                "state_id" => 23,
                "name" => "Offa"
            ],
            [
                "state_id" => 23,
                "name" => "Oke-Ero"
            ],
            [
                "state_id" => 23,
                "name" => "Oyun"
            ],
            [
                "state_id" => 23,
                "name" => "Pategi"
            ],
            [
                "state_id" => 24,
                "name" => "Agege"
            ],
            [
                "state_id" => 24,
                "name" => "Ajeromi-Ifelodun"
            ],
            [
                "state_id" => 24,
                "name" => "Alimosho"
            ],
            [
                "state_id" => 24,
                "name" => "Amuwo-Odofin"
            ],
            [
                "state_id" => 24,
                "name" => "Apapa"
            ],
            [
                "state_id" => 24,
                "name" => "Badagry"
            ],
            [
                "state_id" => 24,
                "name" => "Epe"
            ],
            [
                "state_id" => 24,
                "name" => "Eti-Osa"
            ],
            [
                "state_id" => 24,
                "name" => "Ibeju-Lekki"
            ],
            [
                "state_id" => 24,
                "name" => "Ifako-Ijaiye"
            ],
            [
                "state_id" => 24,
                "name" => "Ikeja"
            ],
            [
                "state_id" => 24,
                "name" => "Ikorodu"
            ],
            [
                "state_id" => 24,
                "name" => "Kosofe"
            ],
            [
                "state_id" => 24,
                "name" => "Lagos-Island"
            ],
            [
                "state_id" => 24,
                "name" => "Lagos-Mainland"
            ],
            [
                "state_id" => 24,
                "name" => "Mushin"
            ],
            [
                "state_id" => 24,
                "name" => "Ojo"
            ],
            [
                "state_id" => 24,
                "name" => "Oshodi-Isolo"
            ],
            [
                "state_id" => 24,
                "name" => "Shomolu"
            ],
            [
                "state_id" => 24,
                "name" => "Suru-Lere"
            ],
            [
                "state_id" => 25,
                "name" => "Akwanga"
            ],
            [
                "state_id" => 25,
                "name" => "Awe"
            ],
            [
                "state_id" => 25,
                "name" => "Doma"
            ],
            [
                "state_id" => 25,
                "name" => "Karu"
            ],
            [
                "state_id" => 25,
                "name" => "Keana"
            ],
            [
                "state_id" => 25,
                "name" => "Keffi"
            ],
            [
                "state_id" => 25,
                "name" => "Kokona"
            ],
            [
                "state_id" => 25,
                "name" => "Lafia"
            ],
            [
                "state_id" => 25,
                "name" => "Nassarawa"
            ],
            [
                "state_id" => 25,
                "name" => "Nassarawa Eggor"
            ],
            [
                "state_id" => 25,
                "name" => "Obi"
            ],
            [
                "state_id" => 25,
                "name" => "Toto"
            ],
            [
                "state_id" => 25,
                "name" => "Wamba"
            ],
            [
                "state_id" => 26,
                "name" => "Agaie"
            ],
            [
                "state_id" => 26,
                "name" => "Agwara"
            ],
            [
                "state_id" => 26,
                "name" => "Bida"
            ],
            [
                "state_id" => 26,
                "name" => "Borgu"
            ],
            [
                "state_id" => 26,
                "name" => "Bosso"
            ],
            [
                "state_id" => 26,
                "name" => "Chanchaga"
            ],
            [
                "state_id" => 26,
                "name" => "Edati"
            ],
            [
                "state_id" => 26,
                "name" => "Gbako"
            ],
            [
                "state_id" => 26,
                "name" => "Gurara"
            ],
            [
                "state_id" => 26,
                "name" => "Katcha"
            ],
            [
                "state_id" => 26,
                "name" => "Kontagora"
            ],
            [
                "state_id" => 26,
                "name" => "Lapai"
            ],
            [
                "state_id" => 26,
                "name" => "Lavum"
            ],
            [
                "state_id" => 26,
                "name" => "Magama"
            ],
            [
                "state_id" => 26,
                "name" => "Mariga"
            ],
            [
                "state_id" => 26,
                "name" => "Mashegu"
            ],
            [
                "state_id" => 26,
                "name" => "Mokwa"
            ],
            [
                "state_id" => 26,
                "name" => "Muya"
            ],
            [
                "state_id" => 26,
                "name" => "Paikoro"
            ],
            [
                "state_id" => 26,
                "name" => "Rafi"
            ],
            [
                "state_id" => 26,
                "name" => "Rajau"
            ],
            [
                "state_id" => 26,
                "name" => "Shiroro"
            ],
            [
                "state_id" => 26,
                "name" => "Suleja"
            ],
            [
                "state_id" => 26,
                "name" => "Tafa"
            ],
            [
                "state_id" => 26,
                "name" => "Wushishi"
            ],
            [
                "state_id" => 27,
                "name" => "Abeokuta -North"
            ],
            [
                "state_id" => 27,
                "name" => "Abeokuta -South"
            ],
            [
                "state_id" => 27,
                "name" => "Ado-Odu/Ota"
            ],
            [
                "state_id" => 27,
                "name" => "Yewa-North"
            ],
            [
                "state_id" => 27,
                "name" => "Yewa-South"
            ],
            [
                "state_id" => 27,
                "name" => "Ewekoro"
            ],
            [
                "state_id" => 27,
                "name" => "Ifo"
            ],
            [
                "state_id" => 27,
                "name" => "Ijebu East"
            ],
            [
                "state_id" => 27,
                "name" => "Ijebu North"
            ],
            [
                "state_id" => 27,
                "name" => "Ijebu North-East"
            ],
            [
                "state_id" => 27,
                "name" => "Ijebu-Ode"
            ],
            [
                "state_id" => 27,
                "name" => "Ikenne"
            ],
            [
                "state_id" => 27,
                "name" => "Imeko-Afon"
            ],
            [
                "state_id" => 27,
                "name" => "Ipokia"
            ],
            [
                "state_id" => 27,
                "name" => "Obafemi -Owode"
            ],
            [
                "state_id" => 27,
                "name" => "Odeda"
            ],
            [
                "state_id" => 27,
                "name" => "Odogbolu"
            ],
            [
                "state_id" => 27,
                "name" => "Ogun-Water Side"
            ],
            [
                "state_id" => 27,
                "name" => "Remo-North"
            ],
            [
                "state_id" => 27,
                "name" => "Shagamu"
            ],
            [
                "state_id" => 28,
                "name" => "Akoko-North-East"
            ],
            [
                "state_id" => 28,
                "name" => "Akoko-North-West"
            ],
            [
                "state_id" => 28,
                "name" => "Akoko-South-West"
            ],
            [
                "state_id" => 28,
                "name" => "Akoko-South-East"
            ],
            [
                "state_id" => 28,
                "name" => "Akure- South"
            ],
            [
                "state_id" => 28,
                "name" => "Akure-North"
            ],
            [
                "state_id" => 28,
                "name" => "Ese-Odo"
            ],
            [
                "state_id" => 28,
                "name" => "Idanre"
            ],
            [
                "state_id" => 28,
                "name" => "Ifedore"
            ],
            [
                "state_id" => 28,
                "name" => "Ilaje"
            ],
            [
                "state_id" => 28,
                "name" => "Ile-Oluji-Okeigbo"
            ],
            [
                "state_id" => 28,
                "name" => "Irele"
            ],
            [
                "state_id" => 28,
                "name" => "Odigbo"
            ],
            [
                "state_id" => 28,
                "name" => "Okitipupa"
            ],
            [
                "state_id" => 28,
                "name" => "Ondo-West"
            ],
            [
                "state_id" => 28,
                "name" => "Ondo East"
            ],
            [
                "state_id" => 28,
                "name" => "Ose"
            ],
            [
                "state_id" => 28,
                "name" => "Owo"
            ],
            [
                "state_id" => 29,
                "name" => "Aiyedaade"
            ],
            [
                "state_id" => 29,
                "name" => "Aiyedire"
            ],
            [
                "state_id" => 29,
                "name" => "Atakunmosa East"
            ],
            [
                "state_id" => 29,
                "name" => "Atakunmosa West"
            ],
            [
                "state_id" => 29,
                "name" => "Boluwaduro"
            ],
            [
                "state_id" => 29,
                "name" => "Boripe"
            ],
            [
                "state_id" => 29,
                "name" => "Ede North"
            ],
            [
                "state_id" => 29,
                "name" => "Ede South"
            ],
            [
                "state_id" => 29,
                "name" => "Egbedore"
            ],
            [
                "state_id" => 29,
                "name" => "Ejigbo"
            ],
            [
                "state_id" => 29,
                "name" => "Ife Central"
            ],
            [
                "state_id" => 29,
                "name" => "Ife East"
            ],
            [
                "state_id" => 29,
                "name" => "Ife North"
            ],
            [
                "state_id" => 29,
                "name" => "Ife South"
            ],
            [
                "state_id" => 29,
                "name" => "Ifedayo"
            ],
            [
                "state_id" => 29,
                "name" => "Ifelodun"
            ],
            [
                "state_id" => 29,
                "name" => "Ila"
            ],
            [
                "state_id" => 29,
                "name" => "Ilesa East"
            ],
            [
                "state_id" => 29,
                "name" => "Ilesa West"
            ],
            [
                "state_id" => 29,
                "name" => "Irepodun"
            ],
            [
                "state_id" => 29,
                "name" => "Irewole"
            ],
            [
                "state_id" => 29,
                "name" => "Isokan"
            ],
            [
                "state_id" => 29,
                "name" => "Iwo"
            ],
            [
                "state_id" => 29,
                "name" => "Obokun"
            ],
            [
                "state_id" => 29,
                "name" => "Odo Otin"
            ],
            [
                "state_id" => 29,
                "name" => "Ola Oluwa"
            ],
            [
                "state_id" => 29,
                "name" => "Olorunda"
            ],
            [
                "state_id" => 29,
                "name" => "Oriade"
            ],
            [
                "state_id" => 29,
                "name" => "Orolu"
            ],
            [
                "state_id" => 29,
                "name" => "Osogbo"
            ],
            [
                "state_id" => 30,
                "name" => "Afijio"
            ],
            [
                "state_id" => 30,
                "name" => "Akinyele"
            ],
            [
                "state_id" => 30,
                "name" => "Atiba"
            ],
            [
                "state_id" => 30,
                "name" => "Atisbo"
            ],
            [
                "state_id" => 30,
                "name" => "Egbeda"
            ],
            [
                "state_id" => 30,
                "name" => "Ibadan-Central"
            ],
            [
                "state_id" => 30,
                "name" => "Ibadan-North-East"
            ],
            [
                "state_id" => 30,
                "name" => "Ibadan-North-West"
            ],
            [
                "state_id" => 30,
                "name" => "Ibadan-South-East"
            ],
            [
                "state_id" => 30,
                "name" => "Ibadan-South West"
            ],
            [
                "state_id" => 30,
                "name" => "Ibarapa-Central"
            ],
            [
                "state_id" => 30,
                "name" => "Ibarapa-East"
            ],
            [
                "state_id" => 30,
                "name" => "Ibarapa-North"
            ],
            [
                "state_id" => 30,
                "name" => "Ido"
            ],
            [
                "state_id" => 30,
                "name" => "Ifedayo"
            ],
            [
                "state_id" => 30,
                "name" => "Ifeloju"
            ],
            [
                "state_id" => 30,
                "name" => "Irepo"
            ],
            [
                "state_id" => 30,
                "name" => "Iseyin"
            ],
            [
                "state_id" => 30,
                "name" => "Itesiwaju"
            ],
            [
                "state_id" => 30,
                "name" => "Iwajowa"
            ],
            [
                "state_id" => 30,
                "name" => "Kajola"
            ],
            [
                "state_id" => 30,
                "name" => "Lagelu"
            ],
            [
                "state_id" => 30,
                "name" => "Ogo-Oluwa"
            ],
            [
                "state_id" => 30,
                "name" => "Ogbomoso-North"
            ],
            [
                "state_id" => 30,
                "name" => "Ogbomosho-South"
            ],
            [
                "state_id" => 30,
                "name" => "Olorunsogo"
            ],
            [
                "state_id" => 30,
                "name" => "Oluyole"
            ],
            [
                "state_id" => 30,
                "name" => "Ona-Ara"
            ],
            [
                "state_id" => 30,
                "name" => "Orelope"
            ],
            [
                "state_id" => 30,
                "name" => "Ori-Ire"
            ],
            [
                "state_id" => 30,
                "name" => "Oyo East"
            ],
            [
                "state_id" => 30,
                "name" => "Oyo West"
            ],
            [
                "state_id" => 30,
                "name" => "saki east"
            ],
            [
                "state_id" => 30,
                "name" => "Saki West"
            ],
            [
                "state_id" => 30,
                "name" => "Surulere"
            ],
            [
                "state_id" => 31,
                "name" => "Barkin Ladi"
            ],
            [
                "state_id" => 31,
                "name" => "Bassa"
            ],
            [
                "state_id" => 31,
                "name" => "Bokkos"
            ],
            [
                "state_id" => 31,
                "name" => "Jos-East"
            ],
            [
                "state_id" => 31,
                "name" => "Jos-South"
            ],
            [
                "state_id" => 31,
                "name" => "Jos-North"
            ],
            [
                "state_id" => 31,
                "name" => "Kanam"
            ],
            [
                "state_id" => 31,
                "name" => "Kanke"
            ],
            [
                "state_id" => 31,
                "name" => "Langtang North"
            ],
            [
                "state_id" => 31,
                "name" => "Langtang South"
            ],
            [
                "state_id" => 31,
                "name" => "Mangu"
            ],
            [
                "state_id" => 31,
                "name" => "Mikang"
            ],
            [
                "state_id" => 31,
                "name" => "Pankshin"
            ],
            [
                "state_id" => 31,
                "name" => "Quan'pan"
            ],
            [
                "state_id" => 31,
                "name" => "Riyom"
            ],
            [
                "state_id" => 31,
                "name" => "Shendam"
            ],
            [
                "state_id" => 31,
                "name" => "Wase"
            ],
            [
                "state_id" => 32,
                "name" => "Abua/Odual"
            ],
            [
                "state_id" => 32,
                "name" => "Ahoada East"
            ],
            [
                "state_id" => 32,
                "name" => "Ahoada West"
            ],
            [
                "state_id" => 32,
                "name" => "Akukutoru"
            ],
            [
                "state_id" => 32,
                "name" => "Andoni"
            ],
            [
                "state_id" => 32,
                "name" => "Asari-Toro"
            ],
            [
                "state_id" => 32,
                "name" => "Bonny"
            ],
            [
                "state_id" => 32,
                "name" => "Degema"
            ],
            [
                "state_id" => 32,
                "name" => "Eleme"
            ],
            [
                "state_id" => 32,
                "name" => "Emuoha"
            ],
            [
                "state_id" => 32,
                "name" => "Etche"
            ],
            [
                "state_id" => 32,
                "name" => "Gokana"
            ],
            [
                "state_id" => 32,
                "name" => "Ikwerre"
            ],
            [
                "state_id" => 32,
                "name" => "Khana"
            ],
            [
                "state_id" => 32,
                "name" => "Obio/Akpor"
            ],
            [
                "state_id" => 32,
                "name" => "Ogba/Egbama/Ndoni"
            ],
            [
                "state_id" => 32,
                "name" => "Ogu/Bolo"
            ],
            [
                "state_id" => 32,
                "name" => "Okrika"
            ],
            [
                "state_id" => 32,
                "name" => "Omuma"
            ],
            [
                "state_id" => 32,
                "name" => "Opobo/Nkoro"
            ],
            [
                "state_id" => 32,
                "name" => "Oyigbo"
            ],
            [
                "state_id" => 32,
                "name" => "Port-Harcourt"
            ],
            [
                "state_id" => 32,
                "name" => "Tai"
            ],
            [
                "state_id" => 33,
                "name" => "Binji"
            ],
            [
                "state_id" => 33,
                "name" => "Bodinga"
            ],
            [
                "state_id" => 33,
                "name" => "Dange-Shuni"
            ],
            [
                "state_id" => 33,
                "name" => "Gada"
            ],
            [
                "state_id" => 33,
                "name" => "Goronyo"
            ],
            [
                "state_id" => 33,
                "name" => "Gudu"
            ],
            [
                "state_id" => 33,
                "name" => "Gwadabawa"
            ],
            [
                "state_id" => 33,
                "name" => "Illela"
            ],
            [
                "state_id" => 33,
                "name" => "Isa"
            ],
            [
                "state_id" => 33,
                "name" => "Kebbe"
            ],
            [
                "state_id" => 33,
                "name" => "Kware"
            ],
            [
                "state_id" => 33,
                "name" => "Raba"
            ],
            [
                "state_id" => 33,
                "name" => "Sabon-Birni"
            ],
            [
                "state_id" => 33,
                "name" => "Shagari"
            ],
            [
                "state_id" => 33,
                "name" => "Silame"
            ],
            [
                "state_id" => 33,
                "name" => "Sokoto North"
            ],
            [
                "state_id" => 33,
                "name" => "Sokoto South"
            ],
            [
                "state_id" => 33,
                "name" => "Tambuwal"
            ],
            [
                "state_id" => 33,
                "name" => "Tanzaga"
            ],
            [
                "state_id" => 33,
                "name" => "Tureta"
            ],
            [
                "state_id" => 33,
                "name" => "Wamakko"
            ],
            [
                "state_id" => 33,
                "name" => "Wurno"
            ],
            [
                "state_id" => 33,
                "name" => "Yabo"
            ],
            [
                "state_id" => 34,
                "name" => "Ardo Kola"
            ],
            [
                "state_id" => 34,
                "name" => "Bali"
            ],
            [
                "state_id" => 34,
                "name" => "Donga"
            ],
            [
                "state_id" => 34,
                "name" => "Gashaka"
            ],
            [
                "state_id" => 34,
                "name" => "Gassol"
            ],
            [
                "state_id" => 34,
                "name" => "Ibi"
            ],
            [
                "state_id" => 34,
                "name" => "Jalingo"
            ],
            [
                "state_id" => 34,
                "name" => "Karim-Lamido"
            ],
            [
                "state_id" => 34,
                "name" => "Kurmi"
            ],
            [
                "state_id" => 34,
                "name" => "Lau"
            ],
            [
                "state_id" => 34,
                "name" => "Sardauna"
            ],
            [
                "state_id" => 34,
                "name" => "Takuni"
            ],
            [
                "state_id" => 34,
                "name" => "Ussa"
            ],
            [
                "state_id" => 34,
                "name" => "Wukari"
            ],
            [
                "state_id" => 34,
                "name" => "Yarro"
            ],
            [
                "state_id" => 34,
                "name" => "Zing"
            ],
            [
                "state_id" => 35,
                "name" => "Bade"
            ],
            [
                "state_id" => 35,
                "name" => "Bursali"
            ],
            [
                "state_id" => 35,
                "name" => "Damaturu"
            ],
            [
                "state_id" => 35,
                "name" => "Fuka"
            ],
            [
                "state_id" => 35,
                "name" => "Fune"
            ],
            [
                "state_id" => 35,
                "name" => "Geidam"
            ],
            [
                "state_id" => 35,
                "name" => "Gogaram"
            ],
            [
                "state_id" => 35,
                "name" => "Gujba"
            ],
            [
                "state_id" => 35,
                "name" => "Gulani"
            ],
            [
                "state_id" => 35,
                "name" => "Jakusko"
            ],
            [
                "state_id" => 35,
                "name" => "Karasuwa"
            ],
            [
                "state_id" => 35,
                "name" => "Machina"
            ],
            [
                "state_id" => 35,
                "name" => "Nangere"
            ],
            [
                "state_id" => 35,
                "name" => "Nguru"
            ],
            [
                "state_id" => 35,
                "name" => "Potiskum"
            ],
            [
                "state_id" => 35,
                "name" => "Tarmua"
            ],
            [
                "state_id" => 35,
                "name" => "Yunisari"
            ],
            [
                "state_id" => 35,
                "name" => "Yusufari"
            ],
            [
                "state_id" => 36,
                "name" => "Anka"
            ],
            [
                "state_id" => 36,
                "name" => "Bakure"
            ],
            [
                "state_id" => 36,
                "name" => "Bukkuyum"
            ],
            [
                "state_id" => 36,
                "name" => "Bungudo"
            ],
            [
                "state_id" => 36,
                "name" => "Gumi"
            ],
            [
                "state_id" => 36,
                "name" => "Gusau"
            ],
            [
                "state_id" => 36,
                "name" => "Isa"
            ],
            [
                "state_id" => 36,
                "name" => "Kaura-Namoda"
            ],
            [
                "state_id" => 36,
                "name" => "Kiyawa"
            ],
            [
                "state_id" => 36,
                "name" => "Maradun"
            ],
            [
                "state_id" => 36,
                "name" => "Marau"
            ],
            [
                "state_id" => 36,
                "name" => "Shinkafa"
            ],
            [
                "state_id" => 36,
                "name" => "Talata-Mafara"
            ],
            [
                "state_id" => 36,
                "name" => "Tsafe"
            ],
            [
                "state_id" => 36,
                "name" => "Zurmi"
            ],
            [
                "state_id" => 9,
                "name" => "Obudu"
            ],
            [
                "state_id" => 37,
                "name" => "Abaji"
            ],
            [
                "state_id" => 37,
                "name" => "Bwari"
            ],
            [
                "state_id" => 37,
                "name" => "Gwagwalada"
            ],
            [
                "state_id" => 37,
                "name" => "Kuje"
            ],
            [
                "state_id" => 37,
                "name" => "Kwali"
            ],
            [
                "state_id" => 37,
                "name" => "Municipal"
            ],
            [
                "state_id" => 12,
                "name" => "Etsako-East"
            ],
            [
                "state_id" => 16,
                "name" => "Ahiazu-Mbaise"
            ],
            [
                "state_id" => 18,
                "name" => "Kaduna South"
            ],
            [
                "state_id" => 16,
                "name" => "Aboh-Mbaise"
            ],
            [
                "state_id" => 9,
                "name" => "Odukpani"
            ],
            [
                "state_id" => 30,
                "name" => "Ibadan-North"
            ]
        ];

        for($i=0; $i < count($lgas); $i++) {
            $lga = new Lga;
            $lga->name = $lgas[$i]["name"];
            $state = State::find($lgas[$i]["state_id"]);
            $lga->state()->associate($state);
            $lga->created_at = new DateTime();
            $lga->save();
        }
    }
}
