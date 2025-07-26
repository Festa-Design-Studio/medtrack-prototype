<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Medication;
use App\Models\Vital;
use App\Models\Appointment;
use Carbon\Carbon;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create demo senior user
        $senior = User::create([
            'name' => 'Margaret Thompson',
            'email' => 'margaret@example.com',
            'password' => bcrypt('password'),
            'phone' => '(555) 123-4567',
            'is_caregiver' => false,
            'high_contrast_mode' => false,
        ]);

        // Create demo caregiver user
        $caregiver = User::create([
            'name' => 'Sarah Thompson',
            'email' => 'sarah@example.com',
            'password' => bcrypt('password'),
            'phone' => '(555) 987-6543',
            'is_caregiver' => true,
            'high_contrast_mode' => false,
        ]);

        // Demo medications for Margaret
        $medications = [
            [
                'name' => 'Lisinopril',
                'dosage' => '10mg',
                'schedule_time' => 'Morning',
                'frequency' => 'Daily',
                'notes' => 'Take with water, before breakfast',
            ],
            [
                'name' => 'Metformin',
                'dosage' => '500mg',
                'schedule_time' => 'Morning',
                'frequency' => 'Daily',
                'notes' => 'Take with food to reduce stomach upset',
            ],
            [
                'name' => 'Atorvastatin',
                'dosage' => '20mg',
                'schedule_time' => 'Evening',
                'frequency' => 'Daily',
                'notes' => 'Take before bedtime',
            ],
            [
                'name' => 'Vitamin D3',
                'dosage' => '2000 IU',
                'schedule_time' => 'Morning',
                'frequency' => 'Daily',
                'notes' => 'Take with breakfast for better absorption',
            ],
            [
                'name' => 'Acetaminophen',
                'dosage' => '500mg',
                'schedule_time' => 'Afternoon',
                'frequency' => 'As Needed',
                'notes' => 'For joint pain, maximum 3000mg per day',
            ],
        ];

        foreach ($medications as $med) {
            Medication::create(array_merge($med, ['user_id' => $senior->id]));
        }

        // Demo vital signs for the past 2 weeks
        $vitals = [
            [
                'blood_pressure' => '135/82',
                'blood_sugar' => 118,
                'weight' => 162.5,
                'mood' => '🙂 Good',
                'note' => 'Feeling great today, took a nice walk',
                'recorded_at' => Carbon::now()->subDays(1)->setTime(8, 30),
            ],
            [
                'blood_pressure' => '142/85',
                'blood_sugar' => 95,
                'weight' => 162.8,
                'mood' => '😐 Okay',
                'note' => 'A bit tired, but overall good',
                'recorded_at' => Carbon::now()->subDays(2)->setTime(8, 15),
            ],
            [
                'blood_pressure' => '138/80',
                'blood_sugar' => 102,
                'weight' => 163.0,
                'mood' => '😊 Great',
                'note' => 'Had a wonderful day with family',
                'recorded_at' => Carbon::now()->subDays(3)->setTime(8, 45),
            ],
            [
                'blood_pressure' => '140/83',
                'blood_sugar' => 125,
                'weight' => 162.2,
                'mood' => '😔 Not great',
                'note' => 'Feeling a bit under the weather',
                'recorded_at' => Carbon::now()->subDays(4)->setTime(8, 20),
            ],
            [
                'blood_pressure' => '136/78',
                'blood_sugar' => 88,
                'weight' => 162.1,
                'mood' => '🙂 Good',
                'note' => 'Morning yoga session completed',
                'recorded_at' => Carbon::now()->subDays(5)->setTime(9, 0),
            ],
            [
                'blood_pressure' => '134/79',
                'blood_sugar' => 110,
                'weight' => 161.9,
                'mood' => '😊 Great',
                'note' => 'Perfect weather for gardening',
                'recorded_at' => Carbon::now()->subDays(6)->setTime(8, 35),
            ],
            [
                'blood_pressure' => '145/87',
                'blood_sugar' => 133,
                'weight' => 162.6,
                'mood' => '😰 Anxious',
                'note' => 'Doctor appointment today - a bit nervous',
                'recorded_at' => Carbon::now()->subDays(7)->setTime(7, 50),
            ],
        ];

        foreach ($vitals as $vital) {
            Vital::create(array_merge($vital, ['user_id' => $senior->id]));
        }

        // Demo appointments
        $appointments = [
            [
                'title' => 'Dr. Smith - Cardiology Follow-up',
                'appointment_at' => Carbon::now()->addDays(3)->setTime(10, 30),
                'location' => 'Heart Care Center, 123 Main St',
                'notes' => 'Bring current medication list and recent blood pressure readings',
            ],
            [
                'title' => 'Dr. Johnson - Annual Physical',
                'appointment_at' => Carbon::now()->addDays(14)->setTime(14, 0),
                'location' => 'Community Health Clinic, 456 Oak Ave',
                'notes' => 'Fasting required - no food after 10 PM the night before',
            ],
            [
                'title' => 'Pharmacy Consultation',
                'appointment_at' => Carbon::now()->addDays(21)->setTime(11, 0),
                'location' => 'HealthMart Pharmacy, 789 Pine St',
                'notes' => 'Medication review and diabetes management discussion',
            ],
            [
                'title' => 'Dr. Wilson - Eye Exam',
                'appointment_at' => Carbon::now()->addDays(28)->setTime(9, 15),
                'location' => 'Vision Care Associates, 321 Elm St',
                'notes' => 'Annual diabetic eye screening',
            ],
        ];

        foreach ($appointments as $appointment) {
            Appointment::create(array_merge($appointment, ['user_id' => $senior->id]));
        }

        // Add some medications for the caregiver too
        $caregiverMeds = [
            [
                'name' => 'Daily Multivitamin',
                'dosage' => '1 tablet',
                'schedule_time' => 'Morning',
                'frequency' => 'Daily',
                'notes' => 'With breakfast',
            ],
            [
                'name' => 'Ibuprofen',
                'dosage' => '200mg',
                'schedule_time' => 'As Needed',
                'frequency' => 'As Needed',
                'notes' => 'For headaches, maximum 1200mg per day',
            ],
        ];

        foreach ($caregiverMeds as $med) {
            Medication::create(array_merge($med, ['user_id' => $caregiver->id]));
        }

        $this->command->info('Demo data created successfully!');
        $this->command->info('Senior User: margaret@example.com / password');
        $this->command->info('Caregiver User: sarah@example.com / password');
    }
}
