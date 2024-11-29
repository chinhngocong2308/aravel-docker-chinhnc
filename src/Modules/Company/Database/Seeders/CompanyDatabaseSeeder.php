<?php

namespace Modules\Company\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

/**
 * Class CompanyDatabaseSeeder
 * @package Modules\Company\Database\Seeders
 */
class CompanyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET foreign_key_checks = 0;');
        if (DB::table('companies')->count() === 0) {
            DB::table('companies')->insert([
                [
                    'company_name' => 'A.P. Moller - Maersk',
                    'industry' => 'Transporting, Logistics, Supply Chain and Storage',
                    'location' => 'Copenhagen',
                    'number_of_followers' => 2000000,
                    'description' => null,
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'Agilent Technologies',
                    'industry' => 'Biotechnology Research',
                    'location' => 'Santa Clara, CA',
                    'number_of_followers' => 592000,
                    'description' => '...infectious diseases, and create alternative energy solutions for a greener planet. From start to finish, we have them covered with our vast product solutions...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),

                ],
                [
                    'company_name' => 'Nestlé',
                    'industry' => 'Food and Beverage Services',
                    'location' => 'Vevey',
                    'number_of_followers' => 16000000,
                    'description' => 'As the world’s largest food and beverage company we are driven by a simple aim: unlocking the power of food to enhance quality of life for everyone, today and for generations to come. To deliver on this, we serve with...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),

                ],
                [
                    'company_name' => 'Honeywell',
                    'industry' => 'Appliances, Electrical, and Electronics Manufacturing',
                    'location' => 'Charlotte, North Carolina',
                    'number_of_followers' => 3000000,
                    'description' => 'Honeywell is a Fortune 500 company that invents and manufactures technologies to address tough challenges linked to global macrotrends such as safety, security, and energy. With approximately 110,000 employees...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),

                ],
                [
                    'company_name' => 'A Cloud Guru | A Pluralsight Company',
                    'industry' => 'E-Learning Providers',
                    'location' => 'Austin, Texas',
                    'number_of_followers' => 224000,
                    'description' => 'We’re on a mission to teach the world to cloud.',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),

                ],
                [
                    'company_name' => 'Automobili Lamborghini S.p.A.',
                    'industry' => 'Motor Vehicle Manufacturing',
                    'location' => 'Sant’Agata Bolognese, BO',
                    'number_of_followers' => 1000000,
                    'description' => 'Brave, authentic and unexpected, Lamborghini is so much more than a brand. Since our foundation in Sant’Agata Bolognese in 1963, we have revolutionized the automotive, design and engineering fields in way...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),

                ],
                [
                    'company_name' => 'Cipher | A Prosegur company',
                    'industry' => 'IT Services and IT Consulting',
                    'location' => 'Miami, Florida',
                    'number_of_followers' => 85000,
                    'description' => 'We are Cipher, a company from the Prosegur group specializing in Cybersecurity. Prosegur is a global leader in the sector in integrated security services...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),

                ],
                [
                    'company_name' => 'Shell',
                    'industry' => 'Oil and Gas',
                    'location' => 'London, England',
                    'number_of_followers' => 7000000,
                    'description' => 'Shell is a global group of energy and petrochemical companies, employing 103,000 people and with operations in more than 70 countries. We serve more than 1 million commercial and industrial customers, a...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),

                ],
                [
                    'company_name' => 'N/A',
                    'industry' => 'IT Services and IT Consulting',
                    'location' => 'San Francisco, California',
                    'number_of_followers' => 65000,
                    'description' => null,
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'BT Group',
                    'industry' => 'Telecommunications',
                    'location' => 'London',
                    'number_of_followers' => 759000,
                    'description' => null,
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'TEI - TUSAŞ Engine Industries, Inc.',
                    'industry' => 'Aviation and Aerospace Component Manufacturing',
                    'location' => 'Eskişehir',
                    'number_of_followers' => 428000,
                    'description' => 'TEI (TUSAŞ Engine Industries) is an incorporated company established in 1985 as a joint venture of Turkish Aerospace Industries Inc., General Electric (GE), Turkish Armed Forces Foundation (TAFF) and Turkish...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'NTU International A/S',
                    'industry' => 'International Affairs',
                    'location' => 'Aalborg, Denmark',
                    'number_of_followers' => 456000,
                    'description' => '... With more than 1,200 implemented long- and short-term projects completed, and 17 project offices around the world, we have established ourselves as a leading consulting company. Through our development...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'Allianz',
                    'industry' => 'Financial Services',
                    'location' => 'Munich',
                    'number_of_followers' => 1000000,
                    'description' => '...leaders in the Dow Jones Sustainability Index. Caring for our employees, their ambitions, dreams and challenges is what makes us a unique employer. Together we can build an environment where everyone feel...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'Aygaz',
                    'industry' => 'Oil and Gas',
                    'location' => 'Istanbul',
                    'number_of_followers' => 60000,
                    'description' => 'Aygaz, the first company of the Koç Conglomerate operating in the energy sector, was founded in 1961. The Company has sustained its leading position for half a...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'C&A',
                    'industry' => 'Retail Apparel and Fashion',
                    'location' => 'Düsseldorf, NRW',
                    'number_of_followers' => 399000,
                    'description' => 'Ever since our founding by the brothers Clemens and August in 1841, C&A has been at the forefront of fashion. From making "ready-to-wear" a thing when custom...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'Venafi, a CyberArk Company',
                    'industry' => 'Computer and Network Security',
                    'location' => 'Salt Lake City, UT',
                    'number_of_followers' => 60000,
                    'description' => 'Venafi, a CyberArk company, offers the most comprehensive solutions to address critical challenges in PKI, certificate management and workload identity management. Through centralized visibility and automation,...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'A-dec Inc.',
                    'industry' => 'Medical Equipment Manufacturing',
                    'location' => 'Newberg, OR',
                    'number_of_followers' => 19000,
                    'description' => 'A-dec provides a quality environment where people work together for the betterment of dentistry worldwide.',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'Codiant - A YASH Technologies Company',
                    'industry' => 'IT Services and IT Consulting',
                    'location' => 'East Moline, Illinois',
                    'number_of_followers' => 37000,
                    'description' => 'CODIANT is a leading Mobility and Custom Web Product Development Company with an immense experience in delivering customized services in the field of Mobile...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'Sodexo',
                    'industry' => 'Facilities Services',
                    'location' => '92866 Issy les Moulineaux Cedex 9',
                    'number_of_followers' => 1000000,
                    'description' => '...Of Food and Facilities Management Services, Sodexo meets all the challenges of everyday life with a dual goal: to improve the quality of life of our employees...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'Avis Budget Group',
                    'industry' => 'Travel Arrangements',
                    'location' => 'Parsippany, NJ',
                    'number_of_followers' => 162000,
                    'description' => 'Avis Budget Group, Inc. is a leading global provider of transportation solutions, both through its Avis and Budget brands, which have more than 11,000 rental locations in approximately 180 countries around the...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'N/A',
                    'industry' => 'IT Services and IT Consulting',
                    'location' => 'San Francisco, California',
                    'number_of_followers' => 65000,
                    'description' => null,
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'BT Group',
                    'industry' => 'Telecommunications',
                    'location' => 'London',
                    'number_of_followers' => 759000,
                    'description' => null,
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'TEI - TUSAŞ Engine Industries, Inc.',
                    'industry' => 'Aviation and Aerospace Component Manufacturing',
                    'location' => 'Eskişehir',
                    'number_of_followers' => 428000,
                    'description' => 'TEI (TUSAŞ Engine Industries) is an incorporated company established in 1985 as a joint venture of Turkish Aerospace Industries Inc., General Electric (GE), Turkish Armed Forces Foundation (TAFF) and Turkish...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'NTU International A/S',
                    'industry' => 'International Affairs',
                    'location' => 'Aalborg, Denmark',
                    'number_of_followers' => 456000,
                    'description' => '... With more than 1,200 implemented long- and short-term projects completed, and 17 project offices around the world, we have established ourselves as a leading consulting company. Through our development...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_name' => 'Allianz',
                    'industry' => 'Financial Services',
                    'location' => 'Munich',
                    'number_of_followers' => 1000000,
                    'description' => '...leaders in the Dow Jones Sustainability Index. Caring for our employees, their ambitions, dreams and challenges is what makes us a unique employer. Together we can build an environment where everyone feel...',
                    'company_size' => rand(100, 2000),
                    'logo_image' => $this->ranImage(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
        DB::statement('SET foreign_key_checks = 1;');

    }

    /**
     * @return string[]
     */
    function getFileNamesInFolder()
    {
        $path = storage_path('app/public/company/logos');
        $files = [];

        if (File::exists($path)) {
            $files = File::files($path);
        }

        $fileNames = array_map(function ($file) {
            return 'storage/company/logos/' . $file->getFilename();
        }, $files);

        return $fileNames;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function ranImage()
    {
        $fileNames = $this->getFileNamesInFolder();

        return collect($fileNames)->random();
    }
}
