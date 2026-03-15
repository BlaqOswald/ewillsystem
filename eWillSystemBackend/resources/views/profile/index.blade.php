@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Profile Details</h4>
                        <!-- Edit Profile Button -->
                        <div>
                            <!-- <button class="btn btn-primary" id="editProfileButton" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                <i class="fas fa-edit"></i>
                            </button> -->
                        </div>
                    </div>
                    <div class="row mt-3">
                        <!-- Profile Image and Basic Info -->
                        <div class="col-md-4 text-center">
                            <i class="fas fa-user-circle fa-7x text-secondary mb-3"></i>
                            <!-- Username -->
                            <h3>{{ $user->username ?? 'No username available' }}</h3>
                            <!-- Role -->
                            <span class="badge" style="background-color:rgb(34, 43, 74); color:white">{{ $user->getRoleNames()->first() ?? 'User ' }}</span>
                        </div>

                        <!-- User Data Preview area -->
                        <div class="col-md-8 mt-3">
                            <table class="table table-borderless">
                                <tbody style="border-right: 1px solid gray; border-bottom: 1px solid gray;">
                                    <tr>
                                        <th scope="row"><i class="fas fa-user"></i> Full Name:</th>
                                        <td>
                                            <span id="fullNamePreview">{{ ($user->first_name ?? '') . ' ' . ($user->last_name ?? '') ?: 'No full name available' }}</span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><i class="fas fa-envelope"></i> Email:</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><i class="fas fa-phone"></i> Contact:</th>
                                        <td>
                                            <span id="contactPreview">{{ $user->contact ?? 'No contact info' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><i class="fas fa-map-marker-alt"></i> Address:</th>
                                        <td>
                                            <span id="addressPreview">{{ $user->current_address ?? 'No address available' }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div style="display:block; text-align:center; width:100%;">
                            <!-- Button to trigger OTP request form -->
                            <button id="requestOtpBtn" class="btn mt-3" style="background-color:rgb(34, 43, 74); color:white"><i class="fas fa-key"></i> Change Password</button>
                            <!-- OTP Request Section - Initially hidden -->
                            <div id="otpRequestSection" style="display: none;">
                                @include('profile.request_otp') <!-- Include the OTP request form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
