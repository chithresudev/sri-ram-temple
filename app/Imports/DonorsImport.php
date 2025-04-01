<?php

namespace App\Imports;

use App\Models\Donor;
use Maatwebsite\Excel\Concerns\ToModel;

class DonorsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Skip invalid rows where a column might be missing or empty
        if (empty($row[1]) || empty($row[2]) || empty($row[3])) {
            return null; // Skip this row
        }
        // Validate phone numbers (10 digits only)
        $phone1 = isset($row[8]) && preg_match('/^\d{10}$/', $row[8]) ? $row[8] : null;
        $phone2 = isset($row[9]) && preg_match('/^\d{10}$/', $row[9]) ? $row[9] : null;

        // Create and return a new Donor instance with the row data
        return new Donor([
            'name' => $row[1],
            'address1' => $row[2],
            'address2' => $row[3],
            'city' => $row[4],
            'district' => $row[5],
            'state' => $row[6],
            'pincode' => $row[7],
            'phone1' => $phone1,
            'phone2' => $phone2,
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}
