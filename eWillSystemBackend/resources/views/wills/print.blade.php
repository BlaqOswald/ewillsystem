@extends('layouts.layout')

  <div class="container">
   
    <div class="container mt-5" v-if="userData.paystatus==1">
        <div style="font-family:'Consolas';font-size: 18.5px;">
        
            <h5 class="text-dark text-center mb-4"><b> THE REPUBLIC OF UGANDA <br> IN THE MATTER THE SUCESSION ACT CAP 162 AS AMENDED BY THE<br> SUCCESSION (AMENDMENT) ACT No.3, 2022 <br> IN THE MATTER OF THE LAST WILL OF <span class="text-uppercase"><b>{{$user->first_name }}</b> <b>{{ $user->last_name }}</b> </span></b> </h5>
        <p>I, <b>{{ $user->first_name }}</b> <b>{{ $user->last_name }}</b> of <b>{{ $user->current_address }}</b> on this <b>{{ date("d") }}</b> of <b>{{ date("m") }}</b> <b>{{ date("Y") }}</b> make and declare this is my last will and revoke all former wills and  codicil(s) and declare this to be my Last Will and Testament.</p>
        <h5 class="text-dark text-center"><b>ARTICLE I <br> IDENTIFICATION OF FAMILY </b></h5>
        <p>
              A. I am married to (Spouse/s)
              
              
              @php
              echo '<ol>';
                foreach ($user->rrelatives as $relative) {
                    if ($relative['type'] == 'Spouse') {
                        echo '<li>';
                        echo '<b>' . $relative['name'] . ' ' . $relative['address'] . ' ' . $relative['contact'] . ' legally married in ' . $relative['mariage'] . '</b>';
                        echo '</li>';
                   }
                }
                echo '</ol>';
                @endphp
              B. That I have the following children;
              
             
              @php
              echo '<ol>';
                foreach ($user->rrelatives as $relative) {
                    if ($relative['type'] == 'Child') {
                        echo '<li>';
                        echo '<b>' . $relative['name'] . ' ' . $relative['gender'] . ' ' . $relative['address'] .' ' . $relative['contact'] . ' ' . $relative['life_status'] . '</b>';
                        echo '</li>';
                   }
                }
                echo '</ol>';
                @endphp
             
              Any reference in this Will to “my children” refers to the above mentioned child(ren) born or adopted by me and may include those after signing the will.<br><br>
              
              C. I have the following dependant
              
             @php
              echo '<ol>';
                foreach ($user->rrelatives as $relative) {
                    if ($relative['type'] == 'Dependant') {
                        echo '<li>';
                        echo '<b>' . $relative['name'] . ' ' . $relative['gender'] . ' ' . $relative['address'] .' ' . $relative['contact'] . '</b>';
                        echo '</li>';
                   }
                }
                echo '</ol>';
                @endphp
              All references in this Will to “my dependants” are references to the above mentioned dependents  after signing this will. 
             
              D. Other people
              
              @php
               echo '<ol>';
                 foreach ($user->rrelatives as $relative) {
                     if ($relative['type'] == 'OtherRelative') {
                         echo '<li>';
                         echo '<b>' . $relative['name'] . ' ' . $relative['gender'] . ' ' . $relative['address'] .' ' . $relative['contact'] . '</b>';
                         echo '</li>';
                    }
                 }
                 echo '</ol>';
                 @endphp
            </p>
            <h5 class="text-dark text-center"><b>ARTICLE II <br> PROPERTIES </b></h5>
            <p>
            I possess the following properties; <br>
            Legal interest of Land/ Real Estate:
            
            <ol type="a">
                @foreach ($user->rland as $land)
                <li> Registered  <b>{{ $land->interest_type }}</b> comprised in <b>{{ $land->district }}</b> district Block <b>{{ $land->block }}</b> Plot <b>{{ $land->plot }}</b> in <b>{{ $land->village }}</b> village measuring approximately <b>{{ $land->size }}</b> </li>
                @endforeach   
            </ol>
           
          
            Houses/Buildings:
                                        
           
            <ol type="a">
                @foreach ($user->rhouse as $house)
                <li> <b>{{ $house->category }}</b> House comprised in <b>{{ $house->location }}</b>, Block<b>{{ $house->block }}</b>, Plot<b>{{ $house->plot }}</b>.</li>
                @endforeach   
            </ol>
            Shares:
           
            <ol type="a">
                @foreach ($user->rshare as $share)
                <li> <b>{{ $share->percentage }}</b> % shares in <b>{{ $share->organisation }}</b> Company/SACCO/Bank.</li>
                @endforeach   
            </ol>
            Vehicles:
            
           
            <ol type="a">
                @foreach ($user->rvehicle as $vehicle)
                <li> <b>{{ $vehicle->name }}</b> Registration No. <b>{{ $vehicle->number_plate }}</b> of model <b>{{ $vehicle->model }}</b> as a <b>{{ $vehicle->type }}</b> car.</li>
                @endforeach   
            </ol>
            Livestock:
            
            
            <ol type="a">
                @foreach ($user->rlivestock as $livestock)
                <li> <b>{{ $livestock->number }}</b> <b>{{ $livestock->type }}</b> at <b>{{ $livestock->location }}</b> on land onwed by <b>{{ $livestock->location_owner }}</b>.</li>
                @endforeach   
            </ol>
            Bank Accounts:
            
            
            <ol type="a">
                @foreach ($user->rbankaccounts as $bankaccount)
                <li> Account Number <b>{{ $bankaccount->account_number }}</b> in the names of <b>{{ $bankaccount->account_name }}</b> in  <b>{{ $bankaccount->bank_name }}</b> Bank <b>{{ $bankaccount->branch }}</b> Branch .</li>
                @endforeach   
            </ol>

            Other Properties:
            
           
            <ol type="a">
                @foreach ($user->rotherproperty as $otherproperty)
                <li>   <b>{{ $otherproperty->name }}</b> number <b>{{ $otherproperty->number }}</b> Details <b>{{ $otherproperty->description }}</b>  .</li>
                @endforeach   
            </ol>
            </p>

            <h5 class="text-dark text-center"><b>ARTICLE III <br>DISPOSITION OF PROPERTY </b></h5>                       
            <p>
            Land/ Real Estate:<br>
            
            {{-- <ol type="i">
                @foreach ($user->rland as $land)
              <li>	I give and bequeath the property comprised in <b>{{ $land->district }}</b> district Block <b>{{ $land->block}}</b> Plot <b>{{ $land->plot }}</b> in <b>{{ $land->village }} </b> on <b>{{ $land->interest_type }} </b> of <b> {{$land->size}}</b> acres to <b>
                @if ($land->rdisposition)
                {{ $land->rdisposition->disposed_to }} ,
              Number:  {{ $land->rdisposition->size }} ,
              Details:  {{ $land->rdisposition->detail }} 
            @else
                     
                  @endif
              </b> if living at the time of my death.Property passing under this article passess subject to all liens, security interests and mortgages and any other incumbraces if applicable. If this beneficiary doesnot survive me this bequest shall be distributed with my residuary estate.</li>
              @endforeach 
            </ol> --}}
            <ol type="i">
              @foreach ($user->rland as $land)
                  <li>
                      I give and bequeath the property comprised in <b>{{ $land->district }}</b> district Block <b>{{ $land->block }}</b> Plot <b>{{ $land->plot }}</b> in <b>{{ $land->village }}</b> on <b>{{ $land->interest_type }}</b> of <b>{{ $land->size }}</b> acres to:
                      @if ($land->rdisposition->count() > 0) <!-- Check if there are disposition details -->
                          <ul>
                              @foreach ($land->rdisposition as $disposition)
                                  <li>
                                      <b>{{ $disposition->disposed_to }}</b>, Size: {{ $disposition->size }}, Details: {{ $disposition->detail }}
                                  </li>
                              @endforeach
                          </ul>
                      @endif
                      if living at the time of my death. Property passing under this article passes subject to all liens, security interests, and mortgages and any other encumbrances if applicable. If this beneficiary does not survive me, this bequest shall be distributed with my residuary estate.
                  </li>
              @endforeach
          </ol>
          
          
          
            Houses/ Buildings:<br>
            <ol type="i">
              <li>I give my residential house to my spouse until her/ his death.</li>
            </ol>
            
            
            <ol type="i">
                @foreach ($user->rhouse as $house)
                    @if ($house->category == 'Commercial')
                        <li>
                            I give and bequeath the <b>{{ $house->category }}</b> House comprised in
                            <b>{{ $house->location }}</b>, Block <b>{{ $house->block }}</b> Plot
                            <b>{{ $house->plot }}</b> to  <b>
                              {{-- @if ($house->rdisposition)
                              {{ $house->rdisposition->disposed_to }} ,
                            Number:  {{ $house->rdisposition->size }} ,
                            Details:  {{ $house->rdisposition->detail }} 
                          @else
                                 
                              @endif --}}
                              @if ($house->rdisposition->count() > 0) 
                          <ul>
                              @foreach ($house->rdisposition as $disposition)
                                  <li>
                                      <b>{{ $disposition->disposed_to }}</b>, Size: {{ $disposition->size }}, Details: {{ $disposition->detail }}
                                  </li>
                              @endforeach
                          </ul>
                      @endif
                          </b> if living at the
                            time of my death.
                        </li>
                    @endif
                @endforeach 
            </ol>

              <b>PRINCIPAL PLACE OF RESIDENCE:</b> principal residential holding and other residential holdings have not been distributed to anyone shall be maintained by my spouse.<br>
            <b>  RESIDUE ESTATE;</b> I direct that my residue estate be distributed to my children equally in equal shares. If a child doesnot survive me, such deceased child’s share shall be be distributed to that child’s beneficiaries at law and respective shares to be determined under the laws Uganda, then in effect, as if the child had intestate at the fixed for distribution under this provision.<br>
              Or legal heir   @php
              echo '<ol>';
                foreach ($user->rrelatives as $relative) {
                    if ($relative['type'] == 'Heir') {
                        // echo '<li>';
                        echo '<b>' . $relative['name'] . ' ' . $relative['gender'] . ' ' . $relative['address'] .' ' . $relative['contact'] .  '</b>';
                        // echo '</li>';
                   }
                }
                echo '</ol>';
                @endphp
              Shares: 
            
          
            
            <ol type="i" >
                @foreach ($user->rshare as $share)
            <li> I give and bequeath share of <b>{{ $share->percentage }}</b> %  in <b>{{ $share->organisation }}</b> Company/SACCO/Bank to <b>
                {{-- @if ($share->rdisposition)
                      {{ $share->rdisposition->disposed_to }} ,
                    Number:  {{ $share->rdisposition->size }} ,
                    Details:  {{ $share->rdisposition->detail }} 
                  @else
                   
                @endif --}}
                @if ($share->rdisposition->count() > 0) 
                <ul>
                    @foreach ($share->rdisposition as $disposition)
                        <li>
                            <b>{{ $disposition->disposed_to }}</b>, Number: {{ $disposition->size }}, Details: {{ $disposition->detail }}
                        </li>
                    @endforeach
                </ul>
            @endif
            </b>.</li>
            @endforeach 
            </ol>
            Vehicles:
                      
            <ol type="i">
                @foreach ($user->rvehicle as $vehicle)
              <li>
                I give and bequeath vehicle <b>{{ $vehicle->name }}</b> registration No <b>{{ $vehicle->number_plate }}</b> model <b>{{ $vehicle->model }}</b> that was <b>{{ $vehicle->type }}</b> to <b>
                  {{-- @if ($vehicle->rdisposition)
                  {{ $vehicle->rdisposition->disposed_to }} ,
                Number:  {{ $vehicle->rdisposition->size }} ,
                Details:  {{ $vehicle->rdisposition->detail }} 
              @else
                       
                    @endif --}}
                    @if ($vehicle->rdisposition->count() > 0) 
                <ul>
                    @foreach ($vehicle->rdisposition as $disposition)
                        <li>
                            <b>{{ $disposition->disposed_to }}</b>, Number: {{ $disposition->size }}, Details: {{ $disposition->detail }}
                        </li>
                    @endforeach
                </ul>
            @endif
                </b>.
            </li>
            
                @endforeach 
            </ol>


          Livestock:
            
          
            <ol type="i">
                @foreach ($user->rlivestock as $livestock)
              <li>I give and bequeath livestock <b>{{ $livestock->number }}</b> <b>{{ $livestock->type }}</b> at <b>{{ $livestock->location }}</b> onwed by <b>{{ $livestock->location_owner }}</b> to <b>
                  {{-- @if ($livestock->rdisposition)
                      {{ $livestock->rdisposition->disposed_to }} ,
                    Number:  {{ $livestock->rdisposition->size }} ,
                    Details:  {{ $livestock->rdisposition->detail }} 
                  @else
                     
                  @endif --}}
                  @if ($livestock->rdisposition->count() > 0) 
                <ul>
                    @foreach ($livestock->rdisposition as $disposition)
                        <li>
                            <b>{{ $disposition->disposed_to }}</b>, Number: {{ $disposition->size }}, Details: {{ $disposition->detail }}
                        </li>
                    @endforeach
                </ul>
            @endif
              </b></li>
              @endforeach 
            </ol>
            Bank Accounts:
          
          
            <ol type="i">
                @foreach ($user->rbankaccounts as $bankaccount)
               <li> I give and bequeath cash amount of Account Number <b>{{ $bankaccount->account_number }}</b> in the names of <b>{{ $bankaccount->account_name }}</b> in  <b>{{ $bankaccount->bank_name }}</b> Bank <b>{{ $bankaccount->branch }}</b> Branch to <b>
                  {{-- @if ($bankaccount->rdisposition)
                      {{ $bankaccount->rdisposition->disposed_to }} ,
                    Number:  {{ $bankaccount->rdisposition->size }} ,
                    Details:  {{ $bankaccount->rdisposition->detail }} 
                  @else
                     
                  @endif --}}
                  @if ($bankaccount->rdisposition->count() > 0) 
                  <ul>
                      @foreach ($bankaccount->rdisposition as $disposition)
                          <li>
                              <b>{{ $disposition->disposed_to }}</b>, Number: {{ $disposition->size }}, Details: {{ $disposition->detail }}
                          </li>
                      @endforeach
                  </ul>
              @endif
              </b>.</li>
              @endforeach 
            </ol>

            Other properties:
          

            <ol type="i">
                @foreach ($user->rotherproperty as $otherproperty)
               <li>  I give and bequeath  <b>{{ $otherproperty->name }}</b>  <b>{{ $otherproperty->number }}</b>   to <b>
                  {{-- @if ($otherproperty->rdisposition)
                  {{ $otherproperty->rdisposition->disposed_to }} ,
                Number:  {{ $otherproperty->rdisposition->size }} ,
                Details:  {{ $otherproperty->rdisposition->detail }} 
              @else
                     
                  @endif --}}
                  @if ($otherproperty->rdisposition->count() > 0) 
                  <ul>
                      @foreach ($otherproperty->rdisposition as $disposition)
                          <li>
                              <b>{{ $disposition->disposed_to }}</b>, Number: {{ $disposition->size }}, Details: {{ $disposition->detail }}
                          </li>
                      @endforeach
                  </ul>
              @endif
              </b>
                .</li>
              @endforeach 
            </ol>

            <i> <b>REMAINING TANGIBLE PROPERTY. My remaining tangible property shall be distributed to my children in equal shares.<br><br></b></i>
            </p>
            
            <h5 class="text-dark text-center"><b>ARTICLE IV <br>DEBTS AND CREDITS. </b></h5>                       
            <p>
            l owe people listed below the money mentioned and direct repayment from my Bank Accounts, that is to say:-
            
           
            <ol>
                @foreach ($user-> rdebtor as  $debtor)
                <li> <b>{{ $debtor->name }}</b> of <b>{{ $debtor->address }}</b> Amount <b>{{ $debtor->amount }}</b> <b>{{ $debtor->description }}</b> </li>
                @endforeach
                </ol>
            The following people owe me the money mentioned, and I direct collection of that money.
            
           
            <ol >
                @foreach ($user-> rcreditor as  $creditor)
                <li> <b>{{ $creditor->name }}</b> of <b>{{ $creditor->address }}</b> Amount <b>{{ $creditor->amount }}</b> <b>{{ $creditor->description }}</b> </li>
                @endforeach
                </ol>
            </p>
            <h5 class="text-dark text-center"><b>ARTICLE V <br>APPOINTMENT OF A GUARDIAN. </b></h5>                       
            <p>Should it be necessary to appoint a guardian of any child(ren) who are minors.
              I appoint
            <ol type="a">
                @foreach ($user-> rguardian as  $guardian)
               <li>   <b>{{$guardian->name}}</b> of <b>{{$guardian->address}}</b> </li>
                 @endforeach
                </ol>
            to be the guardian(s) of my surviving children who are minors at the time of my death. They shall be responsible for their proper education and upbringing. </p>
            <h5 class="text-dark text-center"><b>ARTICLE VI <br>APPOINTMENT OF EXECUTORS. </b></h5>                       
            
           
            <ol type="i">
              I appoint
                @foreach ($user-> rexecutors as  $executor)
               <li>  
                 <b>{{$executor->name}}</b> of <b>{{$executor->address}}</b> . 
               </li>
                 @endforeach
                </ol>
                to be the executor(s) of my will
                <p>If the one of the above executor doesnot serve for any reason, the remaining executor shall serve as sole executor.</p>
            <h5 class="text-dark text-center"><b>ARTICLE VI <br>PLACE OF BURIAL. </b></h5>                       
            
                @foreach ($user-> rburialdetails as  $burialdetails)                       
                <p>I direct that my remains be buried at <b>{{ $burialdetails->location }}</b> burial grounds.</p>
                @endforeach
                
            Instructions:
          
                
                <ol >
                 <li>   {!! $burialdetails->instructions !!}</li>
                </ol>
         
            <h5 class="text-dark text-center"><b>ARTICLE VII <br>PAYMENT OF EXPENSES. </b></h5>                       
          - <p>I direct my Executors to pay from estate expenses of my last illness, funeral,and burial or cremation, including expenses of memorials and memorial services, legally enforcebl claims against me or state, and expenses of administering my estate.<br> 
            i <b>{{$user->first_name}}</b> <b>{{$user->last_name}}</b> sign my name/ signature to this instrument  and do declare that I sign and execute this instrument as my will, that I execute it as my free and voluntary act for the purposes therein expressed and I am an adult of sound mind.<br>
            Dated on the<b>{{ date("d") }}</b> of <b>{{ date("m") }}</b> <b>{{ date("Y") }}</b>.<br>
            Signed By: <b>{{$user->first_name}}</b> <b>{{$user->last_name}}</b><br>
            Signature:  <br>
            Testator.<br> <br>
            We declare that the time of our attestation of this Will, <b>{{$user->first_name}}</b> <b>{{$user->lastname}}</b> was an adult sound mind and that this Will was not procured by duress, fraud, misrepresentation, constraint or undue influence.
        </p>
        <h5 class="text-dark text-center"><b>ATTESTATION OF WITNESSES. </b></h5>                       
        <p>
            In the presence of;<br>
            <br>
            <ol >
            @foreach ($user-> rwitnesses as  $witnesses)
              
                  <li> Name: <b>{{ $witnesses->name }}</b> <br> Address: <b>{{ $witnesses->address }}</b> <br> Phone number: <b>{{ $witnesses->contact }}</b> <br> Signature: …………………………………… <br> </li>
            @endforeach
                </ol> 
            
            NB:<br>
            The Testator and Witnesses must siqnor thumb mark on each and every page of the Will as required by the new law.<br>
            The Testator has not distribute in a Will the principal residential holding and other residential holdings.<br>
            The Testator shall provide for the spouse, lineal descendants and dependant relatives in the Will.<br>
        </p>        
        <div class="mt-5 text-center">
            <center><qr-code :text="$user->will_id" size="50" error-level="L"> </qr-code></center>
            <br><i><b>This will was made with the eWillSystem Software</b> <br> www.eWillSystem.net</i></div>
          </div>
  </div>

@section('script')
<script>
    $(document).ready(function(){
        window.print();
        window.onafterprint=function(event) { location.href = '/wills'};
        } );
</script>
@endsection
