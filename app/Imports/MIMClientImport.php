<?php

namespace App\Imports;

// use App\client_details;  
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\MIM; 
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MIMClientImport implements ToModel, WithHeadingRow, WithChunkReading, ToCollection
{ 
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */ 

    public function  __construct($system)
    {
      $this->system= $system; 
    }

    public function model(array $row)  
    {
      $system = $this->system;
 
      return new MIM([  
        'order_id' => $row['order_id'], 
        'customer_id' => $row['customer_id'],
        'first_name' => $row['first_name'],
        'middle_name' => $row['middle_name'],
        'last_name' => $row['last_name'],
        'date_of_birth' => $row['date_of_birth'],
        'flat_number' => $row['flat_number'],
        'street_number' => $row['street_number'],
        'street_name' => $row['street_name'],
        'suburb' => $row['suburb'],
        'country' => $row['country'],
        'licence_number' => $row['licence_number'],
        'licence_state' => $row['licence_state'],
        'terms_conditions_accepted' => $row['terms_conditions_accepted'],
        'entered' => $row['entered'],
        'entered_user_id' => $row['entered_user_id'],
        'verification_status' => $row['verification_status'],
        'passport_number' => $row['passport_number'],
        'passport_country' => $row['passport_country'],
        'passport_expiry' => $row['passport_expiry'],
        'status' => $row['status'],
        'last_updated' => $row['last_updated'],
        'crn_number' => $row['crn_number'],
        'home_phone_area_code' => $row['home_phone_area_code'],
        'home_phone' => $row['home_phone'],
        'mobile_phone' => $row['mobile_phone'],
        'email' => $row['email'],
        'dob' => $row['dob'],
        'address1' => $row['address1'],
        'address2' => $row['address2'],
        'postcode' => $row['postcode'],
        'state' => $row['state'],
        'benefit_id' => $row['benefit_id'],
        'account_no' => $row['account_no'],
        'email_optout' => $row['email_optout'],
        'is_newsletter_unsubscribed' => $row['is_newsletter_unsubscribed'],
        'unique_id' => $row['unique_id'],
        'is_test_account' => $row['is_test_account'],
        'fortnightly_income' => $row['fortnightly_income'],
        'fortnightly_expenses' => $row['fortnightly_expenses'],
        'home_phone_area_code_2nd' => $row['home_phone_area_code_2nd'],
        'home_phone_2nd' => $row['home_phone_2nd'],
        'mobile_phone_2nd' => $row['mobile_phone_2nd'],
        'unit_no' => $row['unit_no'],
        'street_no' => $row['street_no'],
        'street_type' => $row['street_type'],
        'account_type' => $row['account_type'],
        'frequency_type' => $row['frequency_type'],
        'account_holder_name' => $row['account_holder_name'],
        'bsb' => $row['bsb'],
        'bank_account_no' => $row['bank_account_no'],
        'ezidebit_account_no' => $row['ezidebit_account_no'],
        'ezidebit_creation' => $row['ezidebit_creation'],
        'driver_license_no' => $row['driver_license_no'],
        'medicare_no' => $row['medicare_no'],
        'passport_no' => $row['passport_no'],
        'previous_unit_no' => $row['previous_unit_no'],
        'previous_street_no' => $row['previous_street_no'],
        'previous_street_name' => $row['previous_street_name'],
        'previous_street_type' => $row['previous_street_type'],
        'previous_postcode' => $row['previous_postcode'],
        'previous_suburb' => $row['previous_suburb'],
        'previous_state' => $row['previous_state'],
        'is_skip_tally_limit' => $row['is_skip_tally_limit'],
        'skip_tally_limit_updated_by' => $row['skip_tally_limit_updated_by'],
        'skip_tally_limit_updated_at' => $row['skip_tally_limit_updated_at'],
        'residency_status' => $row['residency_status'],
        'is_consent_privacy_act' => $row['is_consent_privacy_act'],
        'is_essential_opt_out' => $row['is_essential_opt_out'],
        'is_essential_opt_out_sms' => $row['is_essential_opt_out_sms'],
        'customer_password' => $row['customer_password'],
        'authorised_person' => $row['authorised_person'],
        'authorised_relation' => $row['authorised_relation'],
        'authorised_dob' => $row['authorised_dob'],
        'marital_status' => $row['marital_status'],
        'dependants' => $row['dependants'],
        'is_qualify' => $row['is_qualify'],
        'is_no_recent_payment' => $row['is_no_recent_payment'],
        'no_recent_payment_at' => $row['no_recent_payment_at'],
        'user_id' => $row['user_id'],
        'system'    =>  $system
      ]);
}

public function chunkSize(): int
    {
        return 100;
    } 


    public function collection(Collection $rows)
    {
        return $rows; 
    }

      
}
