<?php

use App\District;
use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            ["name"=>"BAGERHAT","district_id"=>"01"],["name"=>"BANDARBAN","district_id"=>"03"],["name"=>"BARGUNA","district_id"=>"04"],["name"=>"BARISHAL","district_id"=>"06"],["name"=>"BHOLA","district_id"=>"09"],["name"=>"BOGURA","district_id"=>"10"],["name"=>"BRAHMANBARIA","district_id"=>"12"],["name"=>"CHANDPUR","district_id"=>"13"],["name"=>"CHAPAINAWABGANJ","district_id"=>"70"],["name"=>"CHATTOGRAM","district_id"=>"15"],["name"=>"CHUADANGA","district_id"=>"18"],["name"=>"COX'S BAZAR","district_id"=>"22"],["name"=>"CUMILLA","district_id"=>"19"],["name"=>"DHAKA","district_id"=>"26"],["name"=>"DINAJPUR","district_id"=>"27"],["name"=>"FARdistrict_idPUR","district_id"=>"29"],["name"=>"FENI","district_id"=>"30"],["name"=>"GAIBANDHA","district_id"=>"32"],["name"=>"GAZIPUR","district_id"=>"33"],["name"=>"GOPALGANJ","district_id"=>"35"],["name"=>"HABIGANJ","district_id"=>"36"],["name"=>"JAMALPUR","district_id"=>"39"],["name"=>"JASHORE","district_id"=>"41"],["name"=>"JHALAKATI","district_id"=>"42"],["name"=>"JHENAdistrict_idAH","district_id"=>"44"],["name"=>"JOYPURHAT","district_id"=>"38"],["name"=>"KHAGRACHHARI","district_id"=>"46"],["name"=>"KHULNA","district_id"=>"47"],["name"=>"KISHOREGANJ","district_id"=>"48"],["name"=>"KURIGRAM","district_id"=>"49"],["name"=>"KUSHTIA","district_id"=>"50"],["name"=>"LAKSHMIPUR","district_id"=>"51"],["name"=>"LALMONIRHAT","district_id"=>"52"],["name"=>"MADARIPUR","district_id"=>"54"],["name"=>"MAGURA","district_id"=>"55"],["name"=>"MANIKGANJ","district_id"=>"56"],["name"=>"MEHERPUR","district_id"=>"57"],["name"=>"MOULVIBAZAR","district_id"=>"58"],["name"=>"MUNSHIGANJ","district_id"=>"59"],["name"=>"MYMENSINGH","district_id"=>"61"],["name"=>"NAOGAON","district_id"=>"64"],["name"=>"NARAIL","district_id"=>"65"],["name"=>"NARAYANGANJ","district_id"=>"67"],["name"=>"NARSINGDI","district_id"=>"68"],["name"=>"NATORE","district_id"=>"69"],["name"=>"NETROKONA","district_id"=>"72"],["name"=>"NILPHAMARI","district_id"=>"73"],["name"=>"NOAKHALI","district_id"=>"75"],["name"=>"PABNA","district_id"=>"76"],["name"=>"PANCHAGARH","district_id"=>"77"],["name"=>"PATUAKHALI","district_id"=>"78"],["name"=>"PIROJPUR","district_id"=>"79"],["name"=>"RAJBARI","district_id"=>"82"],["name"=>"RAJSHAHI","district_id"=>"81"],["name"=>"RANGAMATI","district_id"=>"84"],["name"=>"RANGPUR","district_id"=>"85"],["name"=>"SATKHIRA","district_id"=>"87"],["name"=>"SHARIATPUR","district_id"=>"86"],["name"=>"SHERPUR","district_id"=>"89"],["name"=>"SIRAJGANJ","district_id"=>"88"],["name"=>"SUNAMGANJ","district_id"=>"90"],["name"=>"SYLHET","district_id"=>"91"],["name"=>"TANGAIL","district_id"=>"93"],["name"=>"THAKURGAON","district_id"=>"94"]
        ];

        foreach($districts as $district) {
            District::create($district);
        }
    }
}
