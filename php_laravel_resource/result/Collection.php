php artisan make:resource Resource

        return [
            'id' => $this->id,
            'id_sd_employee' => $this->id_sd_employee,
            'absen_in' => $this->absen_in,
            'absen_in_foto' => $this->absen_in_foto,
            'lat_in_position' => $this->lat_in_position,
            'long_in_position' => $this->long_in_position,
            'absen_out' => $this->absen_out,
            'absen_out_foto' => $this->absen_out_foto,
            'lat_out_position' => $this->lat_out_position,
            'long_out_position' => $this->long_out_position,
            'trans_date' => $this->trans_date,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
        ];