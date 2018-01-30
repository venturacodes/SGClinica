<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Dentist\Appointment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    /**
     * Testa se é possivel marcar uma consulta. A data em questão foi colocada a teste por ser muito antiga.
     *
     * @return void
     */
    public function testIfBookAppointmentIsOk()
    {
        $data = Carbon::create(1950, 2, 2, 19, 30, 0);
        $dataMaisTrintaMinutos = $data->addMinutes(30);
        $appointment = new Appointment();
        $this->assertFalse($appointment->checkIfAlreadyBooked($data, $dataMaisTrintaMinutos, 1));
    }
        /**
     * Testa se depois de uma consulta o sistema acusa que não pode marcar outro agendamento por cima.
     *
     * @return void
     */
    public function testIfCanBookAppointmentAfterSameAppointmentWasBooked()
    {
        $data = Carbon::create(1951, 2, 2, 19, 30, 0);
        $dataMaisTrintaMinutos = $data->addMinutes(30);
        $clinic_id = 1;

        $appointment = new Appointment();
        $appointment->user_id = 1;
        $appointment->client_id = 1;
        $appointment->collaborator_id = 1;
        $appointment->appointment_status_id = 1;
        $appointment->start_time = $data;
        $appointment->end_time = $dataMaisTrintaMinutos;
        $appointment->clinic_id = $clinic_id;
        $appointment->note = "unit_test";
        $appointment->save();

        $this->assertTrue($appointment->checkIfAlreadyBooked($data, $dataMaisTrintaMinutos, $clinic_id));
    }
         /**
     * Testa se depois de uma consulta o sistema acusa que não pode marcar outro agendamento por cima.
     *
     * @return void
     */
    public function testIfCanBookAppointmentAfterAnotherAppointmentWasBooked()
    {
        $agora = Carbon::create(1952, 2, 2, 19, 30, 0);
        $agoraMaisTrintaMinutos = $agora->addMinutes(30);
        $clinic_id = 1;

        $appointment = new Appointment();
        $appointment->user_id = 1;
        $appointment->client_id = 1;
        $appointment->collaborator_id = 1;
        $appointment->appointment_status_id = 1;
        $appointment->start_time = $agora;
        $appointment->end_time = $agoraMaisTrintaMinutos;
        $appointment->clinic_id = $clinic_id;
        $appointment->note = "unit_test";
        $appointment->save();
        $this->assertTrue($appointment->checkIfAlreadyBooked($agora->subMinutes(15), $agoraMaisTrintaMinutos->
            addMinutes(15), $clinic_id));
    }
}
