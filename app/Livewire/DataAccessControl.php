<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DataAccessControl extends Component
{
    // Public properties for data access control
    public $dataCategories = [];
    public $accessLog = [];
    public $sharingSettings = [];
    public $providerAccess = [];
    public $securityStatus = [];
    public $exportOptions = [];
    public $privacyLevel = 'standard'; // 'minimal', 'standard', 'maximum'
    
    // Modal states
    public $showAccessModal = false;
    public $showExportModal = false;
    public $selectedProvider = null;
    public $selectedDataType = null;

    public function mount()
    {
        $this->loadDataCategories();
        $this->loadAccessLog();
        $this->loadProviderAccess();
        $this->loadSecurityStatus();
        $this->loadExportOptions();
    }

    private function loadDataCategories()
    {
        // Based on RFI feedback: "control WHO sees WHAT parts of medical records"
        $this->dataCategories = [
            [
                'id' => 'medications',
                'name' => 'Medications',
                'description' => 'Current prescriptions, dosages, and adherence data',
                'icon' => 'pill',
                'shared_with' => 2,
                'total_records' => 4,
                'sensitivity' => 'medium',
                'sharing_enabled' => true,
                'last_accessed' => '2 days ago'
            ],
            [
                'id' => 'vitals',
                'name' => 'Vital Signs',
                'description' => 'Blood pressure, weight, blood sugar, mood tracking',
                'icon' => 'heart',
                'shared_with' => 1,
                'total_records' => 24,
                'sensitivity' => 'medium',
                'sharing_enabled' => true,
                'last_accessed' => '1 day ago'
            ],
            [
                'id' => 'appointments',
                'name' => 'Appointments',
                'description' => 'Scheduled visits, visit history, provider notes',
                'icon' => 'calendar',
                'shared_with' => 2,
                'total_records' => 8,
                'sensitivity' => 'low',
                'sharing_enabled' => true,
                'last_accessed' => '3 days ago'
            ],
            [
                'id' => 'test_results',
                'name' => 'Test Results',
                'description' => 'Lab results, imaging, diagnostic reports',
                'icon' => 'document',
                'shared_with' => 1,
                'total_records' => 12,
                'sensitivity' => 'high',
                'sharing_enabled' => false,
                'last_accessed' => 'Never'
            ],
            [
                'id' => 'insurance',
                'name' => 'Insurance Information',
                'description' => 'Coverage details, claims, payment history',
                'icon' => 'shield',
                'shared_with' => 0,
                'total_records' => 6,
                'sensitivity' => 'high',
                'sharing_enabled' => false,
                'last_accessed' => 'Never'
            ]
        ];
    }

    private function loadAccessLog()
    {
        // Addresses RFI demand for transparency: "WHO accessed WHAT WHEN"
        $this->accessLog = [
            [
                'provider' => 'Dr. Sarah Johnson',
                'data_accessed' => 'Medications, Vital Signs',
                'access_time' => '2 days ago',
                'purpose' => 'Routine checkup preparation',
                'location' => 'Georgetown Medical Center',
                'ip_address' => '192.168.1.***'
            ],
            [
                'provider' => 'CVS Pharmacy',
                'data_accessed' => 'Medications only',
                'access_time' => '3 days ago',
                'purpose' => 'Prescription verification',
                'location' => 'CVS Store #1234',
                'ip_address' => '10.0.1.***'
            ],
            [
                'provider' => 'Dr. Michael Chen',
                'data_accessed' => 'Vital Signs, Test Results',
                'access_time' => '1 week ago',
                'purpose' => 'Cardiology consultation',
                'location' => 'Heart Center',
                'ip_address' => '172.16.0.***'
            ]
        ];
    }

    private function loadProviderAccess()
    {
        // Current providers with access
        $this->providerAccess = [
            [
                'id' => 1,
                'name' => 'Dr. Sarah Johnson',
                'specialty' => 'Internal Medicine',
                'organization' => 'Georgetown Medical Center',
                'access_level' => 'Full',
                'permissions' => ['medications', 'vitals', 'appointments'],
                'granted_date' => '2024-01-15',
                'last_access' => '2 days ago',
                'digital_capability' => 5, // 1-5 stars
                'secure_messaging' => true,
                'data_export' => true
            ],
            [
                'id' => 2,
                'name' => 'CVS Pharmacy',
                'specialty' => 'Pharmacy',
                'organization' => 'CVS Health',
                'access_level' => 'Limited',
                'permissions' => ['medications'],
                'granted_date' => '2024-02-01',
                'last_access' => '3 days ago',
                'digital_capability' => 4,
                'secure_messaging' => true,
                'data_export' => false
            ],
            [
                'id' => 3,
                'name' => 'Emergency Contact',
                'specialty' => 'Family Member',
                'organization' => 'Personal',
                'access_level' => 'Emergency Only',
                'permissions' => ['medications', 'vitals'],
                'granted_date' => '2024-01-01',
                'last_access' => 'Never',
                'digital_capability' => 3,
                'secure_messaging' => false,
                'data_export' => false
            ]
        ];
    }

    private function loadSecurityStatus()
    {
        // Security and privacy indicators
        $this->securityStatus = [
            'encryption_status' => 'Active',
            'two_factor_enabled' => true,
            'data_backup' => 'Automated',
            'breach_monitoring' => 'Active',
            'compliance_status' => 'HIPAA Compliant',
            'last_security_check' => 'Today',
            'privacy_score' => 95
        ];
    }

    private function loadExportOptions()
    {
        // Data export options - addresses "machine-readable access" demand
        $this->exportOptions = [
            [
                'format' => 'PDF',
                'description' => 'Human-readable summary for personal use',
                'file_size' => '2-5 MB',
                'includes' => 'All data with charts and summaries'
            ],
            [
                'format' => 'CSV',
                'description' => 'Spreadsheet format for analysis',
                'file_size' => '< 1 MB',
                'includes' => 'Raw data only, no formatting'
            ],
            [
                'format' => 'FHIR',
                'description' => 'Healthcare standard format for providers',
                'file_size' => '< 1 MB',
                'includes' => 'Structured medical data'
            ],
            [
                'format' => 'JSON',
                'description' => 'Technical format for developers',
                'file_size' => '< 1 MB',
                'includes' => 'Complete data structure'
            ]
        ];
    }

    public function toggleDataSharing($categoryId)
    {
        // Toggle sharing for specific data category
        foreach ($this->dataCategories as &$category) {
            if ($category['id'] === $categoryId) {
                $category['sharing_enabled'] = !$category['sharing_enabled'];
                
                // Log the change
                $action = $category['sharing_enabled'] ? 'enabled' : 'disabled';
                session()->flash('privacy-change', "✅ Data sharing {$action} for {$category['name']}");
                
                break;
            }
        }
    }

    public function revokeProviderAccess($providerId)
    {
        // Revoke access for specific provider
        foreach ($this->providerAccess as $index => $provider) {
            if ($provider['id'] === $providerId) {
                unset($this->providerAccess[$index]);
                session()->flash('access-revoked', "🚫 Access revoked for {$provider['name']}");
                break;
            }
        }
        $this->providerAccess = array_values($this->providerAccess); // Reset array keys
    }

    public function editProviderAccess($providerId)
    {
        // Open modal to edit provider permissions
        $this->selectedProvider = collect($this->providerAccess)->firstWhere('id', $providerId);
        $this->showAccessModal = true;
    }

    public function updateProviderPermissions()
    {
        // Update provider permissions
        foreach ($this->providerAccess as &$provider) {
            if ($provider['id'] === $this->selectedProvider['id']) {
                $provider['permissions'] = $this->selectedProvider['permissions'];
                break;
            }
        }
        
        $this->showAccessModal = false;
        session()->flash('permissions-updated', "✅ Permissions updated for {$this->selectedProvider['name']}");
    }

    public function grantNewAccess()
    {
        // Navigate to provider search/grant access flow
        $this->dispatch('show-provider-search');
    }

    public function exportData($format)
    {
        // Export user data in specified format
        $this->dispatch('export-user-data', ['format' => $format]);
        session()->flash('export-started', "📄 Exporting data as {$format}...");
    }

    public function showExportModal()
    {
        $this->showExportModal = true;
    }

    public function hideExportModal()
    {
        $this->showExportModal = false;
    }

    public function setPrivacyLevel($level)
    {
        $this->privacyLevel = $level;
        
        // Apply privacy level settings
        if ($level === 'minimal') {
            // Disable most sharing
            foreach ($this->dataCategories as &$category) {
                if ($category['sensitivity'] !== 'low') {
                    $category['sharing_enabled'] = false;
                }
            }
        } elseif ($level === 'maximum') {
            // Enable all sharing
            foreach ($this->dataCategories as &$category) {
                $category['sharing_enabled'] = true;
            }
        }
        
        session()->flash('privacy-level-changed', "🔒 Privacy level set to {$level}");
    }

    public function viewAccessDetails($logIndex)
    {
        // Show detailed access information
        $this->dispatch('show-access-details', ['log' => $this->accessLog[$logIndex]]);
    }

    public function render()
    {
        return view('livewire.data-access-control');
    }
}
