<div class="space-y-lg" role="main" aria-labelledby="data-control-title">
  <!-- Page Header -->
  <header>
    <h1 id="data-control-title" class="text-3xl font-bold text-neutral-900">Your Health Data Control Center</h1>
    <p class="text-lg text-neutral-600 mt-sm">
      Complete control over who can access your health information
    </p>
    <!-- RFI Quote Reference -->
    <blockquote class="mt-md p-md bg-success-50 border-l-4 border-success-500 rounded-r-lg">
      <p class="text-base italic text-success-800">
        "Real-time, machine-readable access to our complete health information" 
      </p>
      <cite class="text-sm text-success-600">- Patient feedback from CMS-2019-0039</cite>
    </blockquote>
  </header>
  
  <!-- Security Status Overview -->
  <section aria-labelledby="security-status">
    <h2 id="security-status" class="sr-only">Security status overview</h2>
    <div class="card bg-gradient-to-r from-success-500 to-success-600 text-white" role="banner">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-md">
          <svg class="w-12 h-12 text-success-100" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
          </svg>
          <div>
            <h3 class="text-2xl font-bold">Your Data is Secure</h3>
            <p class="text-success-100">{{ $securityStatus['compliance_status'] }} • Privacy Score: {{ $securityStatus['privacy_score'] }}%</p>
          </div>
        </div>
        <div class="text-right">
          <div class="flex items-center space-x-md">
            <div class="text-right">
              <p class="text-lg font-semibold">{{ count($providerAccess) }} providers</p>
              <p class="text-success-100 text-sm">have access</p>
            </div>
            <div class="text-right">
              <p class="text-lg font-semibold">{{ count(array_filter($dataCategories, fn($cat) => $cat['sharing_enabled'])) }}/{{ count($dataCategories) }} categories</p>
              <p class="text-success-100 text-sm">sharing enabled</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Privacy Level Quick Settings -->
  <section aria-labelledby="privacy-settings">
    <h2 id="privacy-settings" class="text-2xl font-semibold text-neutral-900 mb-lg">Privacy Level</h2>
    <div class="card">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-lg font-semibold text-neutral-900">Data Sharing Level</h3>
          <p class="text-base text-neutral-600">Choose how much information you want to share</p>
        </div>
        <div class="flex space-x-sm">
          <button wire:click="setPrivacyLevel('minimal')" 
                  class="px-md py-sm rounded-lg text-sm font-medium transition-colors
                         {{ $privacyLevel === 'minimal' ? 'bg-error-100 text-error-800' : 'bg-neutral-100 text-neutral-700 hover:bg-neutral-200' }}">
            Minimal
          </button>
          <button wire:click="setPrivacyLevel('standard')" 
                  class="px-md py-sm rounded-lg text-sm font-medium transition-colors
                         {{ $privacyLevel === 'standard' ? 'bg-primary-100 text-primary-800' : 'bg-neutral-100 text-neutral-700 hover:bg-neutral-200' }}">
            Standard
          </button>
          <button wire:click="setPrivacyLevel('maximum')" 
                  class="px-md py-sm rounded-lg text-sm font-medium transition-colors
                         {{ $privacyLevel === 'maximum' ? 'bg-success-100 text-success-800' : 'bg-neutral-100 text-neutral-700 hover:bg-neutral-200' }}">
            Maximum
          </button>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Data Categories Control -->
  <section aria-labelledby="data-categories">
    <h2 id="data-categories" class="text-2xl font-semibold text-neutral-900 mb-lg">Control What You Share</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
      @foreach($dataCategories as $category)
        <article class="card border-l-4 {{ $category['sharing_enabled'] ? 'border-success-500' : 'border-neutral-300' }}">
          <div class="flex items-start justify-between">
            <div class="flex items-start space-x-md flex-1">
              <!-- Category Icon -->
              <div class="flex-shrink-0 {{ $category['sharing_enabled'] ? 'text-success-600' : 'text-neutral-400' }}" aria-hidden="true">
                @switch($category['icon'])
                  @case('pill')
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                    @break
                  @case('heart')
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    @break
                  @case('calendar')
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    @break
                  @case('document')
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                    @break
                  @case('shield')
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    @break
                @endswitch
              </div>
              
              <!-- Category Details -->
              <div class="flex-1">
                <h3 class="text-lg font-semibold text-neutral-900">{{ $category['name'] }}</h3>
                <p class="text-sm text-neutral-600 mt-xs">{{ $category['description'] }}</p>
                
                <!-- Category Stats -->
                <div class="flex items-center mt-sm space-x-lg text-sm text-neutral-500">
                  <span>{{ $category['total_records'] }} records</span>
                  <span>Shared with {{ $category['shared_with'] }} provider{{ $category['shared_with'] !== 1 ? 's' : '' }}</span>
                  <span class="inline-flex items-center px-xs py-xs rounded text-xs font-medium
                               {{ $category['sensitivity'] === 'high' ? 'bg-error-100 text-error-800' : 
                                  ($category['sensitivity'] === 'medium' ? 'bg-warning-100 text-warning-800' : 'bg-success-100 text-success-800') }}">
                    {{ ucfirst($category['sensitivity']) }} sensitivity
                  </span>
                </div>
                
                <p class="text-xs text-neutral-500 mt-xs">
                  Last accessed: {{ $category['last_accessed'] }}
                </p>
              </div>
            </div>
            
            <!-- Toggle Control -->
            <div class="flex flex-col items-end space-y-sm">
              <button wire:click="toggleDataSharing('{{ $category['id'] }}')" 
                      type="button"
                      class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2
                             {{ $category['sharing_enabled'] ? 'bg-success-600' : 'bg-neutral-200' }}"
                      role="switch" 
                      aria-checked="{{ $category['sharing_enabled'] ? 'true' : 'false' }}"
                      aria-labelledby="sharing-{{ $category['id'] }}-label">
                <span class="sr-only">Toggle {{ $category['name'] }} sharing</span>
                <span aria-hidden="true" 
                      class="inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out
                             {{ $category['sharing_enabled'] ? 'translate-x-5' : 'translate-x-0' }}"></span>
              </button>
              
              <span id="sharing-{{ $category['id'] }}-label" class="text-xs font-medium
                           {{ $category['sharing_enabled'] ? 'text-success-600' : 'text-neutral-500' }}">
                {{ $category['sharing_enabled'] ? 'Sharing ON' : 'Sharing OFF' }}
              </span>
            </div>
          </div>
        </article>
      @endforeach
    </div>
  </section>
  
  <!-- Current Provider Access -->
  <section aria-labelledby="provider-access">
    <div class="flex items-center justify-between mb-lg">
      <h2 id="provider-access" class="text-2xl font-semibold text-neutral-900">Who Has Access</h2>
      <button wire:click="grantNewAccess" class="btn-primary">
        Grant New Access
      </button>
    </div>
    
    <div class="space-y-md">
      @forelse($providerAccess as $provider)
        <article class="card hover:shadow-medium transition-shadow">
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-md">
              <!-- Provider Avatar -->
              <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  @if($provider['specialty'] === 'Family Member')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                  @elseif($provider['specialty'] === 'Pharmacy')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                  @else
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                  @endif
                </svg>
              </div>
              
              <!-- Provider Info -->
              <div>
                <h3 class="text-lg font-semibold text-neutral-900">{{ $provider['name'] }}</h3>
                <p class="text-sm text-neutral-600">{{ $provider['specialty'] }} • {{ $provider['organization'] }}</p>
                
                <!-- Digital Capability Rating -->
                <div class="flex items-center mt-xs space-x-sm">
                  <div class="flex">
                    @for($i = 1; $i <= 5; $i++)
                      <svg class="w-4 h-4 {{ $i <= $provider['digital_capability'] ? 'text-warning-400' : 'text-neutral-300' }}" 
                           fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                      </svg>
                    @endfor
                  </div>
                  <span class="text-xs text-neutral-600">Digital capability</span>
                </div>
                
                <!-- Access Details -->
                <div class="flex flex-wrap gap-xs mt-sm">
                  @foreach($provider['permissions'] as $permission)
                    <span class="inline-flex items-center px-xs py-xs rounded-md text-xs font-medium bg-primary-100 text-primary-800">
                      {{ ucfirst(str_replace('_', ' ', $permission)) }}
                    </span>
                  @endforeach
                </div>
                
                <p class="text-xs text-neutral-500 mt-xs">
                  Access granted: {{ date('M j, Y', strtotime($provider['granted_date'])) }} • 
                  Last access: {{ $provider['last_access'] }}
                </p>
              </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex space-x-sm">
              <button wire:click="editProviderAccess({{ $provider['id'] }})" 
                      class="btn-secondary text-sm">
                Edit Access
              </button>
              <button wire:click="revokeProviderAccess({{ $provider['id'] }})" 
                      class="btn-secondary text-sm text-error-700 hover:text-error-800">
                Revoke
              </button>
            </div>
          </div>
        </article>
      @empty
        <div class="card text-center py-lg">
          <svg class="w-12 h-12 text-neutral-400 mx-auto mb-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
          </svg>
          <p class="text-base text-neutral-600">No providers currently have access to your data</p>
          <button wire:click="grantNewAccess" class="btn-primary mt-md">Grant Access to Provider</button>
        </div>
      @endforelse
    </div>
  </section>
  
  <!-- Access Log -->
  <section aria-labelledby="access-log">
    <h2 id="access-log" class="text-2xl font-semibold text-neutral-900 mb-lg">Recent Access Activity</h2>
    <div class="card">
      <div class="card-header">
        <h3 class="text-xl font-semibold text-neutral-900">Who Accessed Your Data</h3>
        <p class="text-base text-neutral-600">Complete transparency of all data access</p>
      </div>
      
      <div class="space-y-md">
        @forelse($accessLog as $index => $log)
          <article class="flex items-start justify-between p-md border border-neutral-200 rounded-lg hover:bg-neutral-50 transition-colors">
            <div class="flex-1">
              <h4 class="text-base font-medium text-neutral-900">{{ $log['provider'] }}</h4>
              <p class="text-sm text-neutral-600">Accessed: {{ $log['data_accessed'] }}</p>
              <p class="text-sm text-neutral-500">{{ $log['purpose'] }} • {{ $log['location'] }}</p>
              <p class="text-xs text-neutral-400 mt-xs">
                IP: {{ $log['ip_address'] }} • {{ $log['access_time'] }}
              </p>
            </div>
            <button wire:click="viewAccessDetails({{ $index }})" 
                    class="btn-secondary text-sm">
              View Details
            </button>
          </article>
        @empty
          <p class="text-center text-neutral-600 py-lg">No recent access activity</p>
        @endforelse
      </div>
    </div>
  </section>
  
  <!-- Data Export Options -->
  <section aria-labelledby="data-export">
    <div class="flex items-center justify-between mb-lg">
      <h2 id="data-export" class="text-2xl font-semibold text-neutral-900">Export Your Data</h2>
      <button wire:click="showExportModal" class="btn-primary">
        Export Data
      </button>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-md">
      @foreach($exportOptions as $option)
        <article class="card hover:shadow-medium transition-shadow cursor-pointer" 
                 wire:click="exportData('{{ strtolower($option['format']) }}')">
          <div class="text-center">
            <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-md">
              <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
              </svg>
            </div>
            <h3 class="text-lg font-semibold text-neutral-900">{{ $option['format'] }}</h3>
            <p class="text-sm text-neutral-600 mt-xs">{{ $option['description'] }}</p>
            <p class="text-xs text-neutral-500 mt-sm">
              Size: {{ $option['file_size'] }} • {{ $option['includes'] }}
            </p>
          </div>
        </article>
      @endforeach
    </div>
  </section>
  
  <!-- Patient Rights Information -->
  <aside class="card bg-primary-50 border-primary-200" role="complementary" aria-labelledby="patient-rights">
    <h2 id="patient-rights" class="text-xl font-semibold text-primary-900 mb-md">
      Your Data Rights
    </h2>
    <div class="space-y-sm text-base text-primary-800">
      <p>
        <svg class="w-5 h-5 inline mr-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
        </svg>
        <strong>You control who can access your health data.</strong>
      </p>
      <p>
        This control center addresses feedback from patients demanding "real-time access" and "granular control" over their health information.
      </p>
      <p>
        <a href="/help/data-rights" class="text-primary-700 underline hover:text-primary-800">
          Learn more about your health data rights →
        </a>
      </p>
    </div>
  </aside>
  
  <!-- Flash Messages -->
  @if(session()->has('privacy-change'))
    <div class="fixed bottom-4 right-4 bg-success-100 border border-success-200 rounded-lg p-md text-success-800 shadow-lg z-50" role="alert">
      {{ session('privacy-change') }}
    </div>
  @endif
  
  @if(session()->has('access-revoked'))
    <div class="fixed bottom-4 right-4 bg-error-100 border border-error-200 rounded-lg p-md text-error-800 shadow-lg z-50" role="alert">
      {{ session('access-revoked') }}
    </div>
  @endif
  
  @if(session()->has('export-started'))
    <div class="fixed bottom-4 right-4 bg-primary-100 border border-primary-200 rounded-lg p-md text-primary-800 shadow-lg z-50" role="alert">
      {{ session('export-started') }}
    </div>
  @endif
  
  @if(session()->has('privacy-level-changed'))
    <div class="fixed bottom-4 right-4 bg-primary-100 border border-primary-200 rounded-lg p-md text-primary-800 shadow-lg z-50" role="alert">
      {{ session('privacy-level-changed') }}
    </div>
  @endif
</div>
