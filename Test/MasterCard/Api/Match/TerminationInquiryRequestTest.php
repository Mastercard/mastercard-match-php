<?php
/*
 * Copyright 2016 MasterCard International.
 *
 * Redistribution and use in source and binary forms, with or without modification, are 
 * permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of 
 * conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * Neither the name of the MasterCard International Incorporated nor the names of its 
 * contributors may be used to endorse or promote products derived from this software 
 * without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES 
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT 
 * SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, 
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
 * TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; 
 * OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER 
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING 
 * IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF 
 * SUCH DAMAGE.
 *
 */

namespace MasterCard\Api\Match;

use MasterCard\Core\Model\RequestMap;
use MasterCard\Core\ApiConfig;
use MasterCard\Core\Security\OAuth\OAuthAuthentication;
use Test\BaseTest;



class TerminationInquiryRequestTest extends BaseTest {

    public static $responses = array();

    protected function setUp() {
        parent::setUp();
        //ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        BaseTest::resetAuthentication();
    }

    
    
                
        public function test_example_termination_inquiry()
        {
            

            

            $map = new RequestMap();
            $map->set("PageOffset", "0");
            $map->set("PageLength", "10");
            $map->set("TerminationInquiryRequest.AcquirerId", "1996");
            $map->set("TerminationInquiryRequest.Merchant.Name", "XYZTEST  XYZTECHMERCHANT");
            $map->set("TerminationInquiryRequest.Merchant.DoingBusinessAsName", "XYZTEST  XYZTECHMERCHANT");
            $map->set("TerminationInquiryRequest.Merchant.AltPhoneNumber", "3098876333");
            $map->set("TerminationInquiryRequest.Merchant.Address.Line1", "88 Nounce World");
            $map->set("TerminationInquiryRequest.Merchant.Address.Line2", "APT 9009");
            $map->set("TerminationInquiryRequest.Merchant.Address.City", "MICKENVINCE");
            $map->set("TerminationInquiryRequest.Merchant.Address.CountrySubdivision", "MO");
            $map->set("TerminationInquiryRequest.Merchant.Address.PostalCode", "66559");
            $map->set("TerminationInquiryRequest.Merchant.Address.Country", "USA");
            $map->set("TerminationInquiryRequest.Merchant.ServiceProvLegal", "JJC WORKSHIRE");
            $map->set("TerminationInquiryRequest.Merchant.Principal.FirstName", "PRINCE");
            $map->set("TerminationInquiryRequest.Merchant.Principal.LastName", "HENREY");
            $map->set("TerminationInquiryRequest.Merchant.Principal.PhoneNumber", "9983339923");
            $map->set("TerminationInquiryRequest.Merchant.Principal.AltPhoneNumber", "6365689336");
            $map->set("TerminationInquiryRequest.Merchant.Principal.Address.CountrySubdivision", "IL");
            $map->set("TerminationInquiryRequest.Merchant.Principal.Address.PostalCode", "66579");
            $map->set("TerminationInquiryRequest.Merchant.Principal.Address.Country", "USA");
            $map->set("TerminationInquiryRequest.Merchant.SearchCriteria.SearchAll", "Y");
            $map->set("TerminationInquiryRequest.Merchant.SearchCriteria.MinPossibleMatchCount", "1");
            
            
            $response = TerminationInquiryRequest::create($map);

            $ignoreAssert = array();
            
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PageOffset", "0");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TotalLength", "14");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Name", "XYZTEST  XYZTECHMERCHANT");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.DoingBusinessAsName", "XYZTEST  XYZTECHMERCHANT");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.AddedByAcquirerID", "1996");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.AddedOnDate", "10/13/2015");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.PhoneNumber", "5675543210");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.AltPhoneNumber", "5672655441");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Address.Line1", "6700 BEN NEVIS");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Address.City", "GLASGOW");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Address.CountrySubdivision", "MA");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Address.PostalCode", "93137");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Address.Country", "USA");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.CountrySubdivisionTaxId", "*****");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.NationalTaxId", "*****");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.ServiceProvLegal", "TESTXYZ SVC PRVDER");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.ServiceProvDBA", "JNL ASSOC");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].FirstName", "PAUL");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].LastName", "HEMINGHOFF");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].NationalId", "*****");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].PhoneNumber", "3906541234");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].AltPhoneNumber", "4567390234");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].Address.Line1", "2200 SHEPLEY DRIVE");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].Address.Line2", "SUITE 789");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].Address.City", "BROWNSVILLE");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].Address.CountrySubdivision", "MO");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].Address.PostalCode", "89022");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].Address.Country", "USA");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].DriversLicense.Number", "*****");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].DriversLicense.CountrySubdivision", "MS");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].DriversLicense.Country", "USA");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.UrlGroup[0].NoMatchUrls.Url[0]", "WWW.TESTJJ.COM");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.UrlGroup[0].NoMatchUrls.Url[1]", "WWW.JNLTESTJJ.COM");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.TerminationReasonCode", "04");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.Name", "M01");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.DoingBusinessAsName", "M02");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.Address", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PhoneNumber", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.AltPhoneNumber", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.CountrySubdivisionTaxId", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.NationalTaxId", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.ServiceProvLegal", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.ServiceProvDBA", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PrincipalMatch[0].Name", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PrincipalMatch[0].Address", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PrincipalMatch[0].PhoneNumber", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PrincipalMatch[0].AltPhoneNumber", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PrincipalMatch[0].NationalId", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PrincipalMatch[0].DriversLicense", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Name", "XYZTEST  XYZTECHMERCHANT");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.DoingBusinessAsName", "XYZTEST  XYZTECHMERCHANT");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.AddedByAcquirerID", "1996");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.AddedOnDate", "01/20/2016");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.PhoneNumber", "5675543210");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.AltPhoneNumber", "5672655441");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Address.Line1", "6700 BEN NEVIS");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Address.City", "GLASGOW");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Address.CountrySubdivision", "MA");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Address.PostalCode", "93137");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Address.Country", "USA");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.CountrySubdivisionTaxId", "*****");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.NationalTaxId", "*****");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.ServiceProvLegal", "TESTXYZ SVC PRVDER");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.ServiceProvDBA", "JNL ASSOC");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].FirstName", "PAUL");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].LastName", "HEMINGHOFF");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].NationalId", "*****");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].PhoneNumber", "3906541234");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].AltPhoneNumber", "4567390234");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].Address.Line1", "2200 SHEPLEY DRIVE");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].Address.Line2", "SUITE 789");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].Address.City", "BROWNSVILLE");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].Address.CountrySubdivision", "MO");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].Address.PostalCode", "89022");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].Address.Country", "USA");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].DriversLicense.Number", "*****");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].DriversLicense.CountrySubdivision", "MS");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].DriversLicense.Country", "USA");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.UrlGroup[0].NoMatchUrls.Url[0]", "WWW.TESTJJ.COM");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.UrlGroup[0].NoMatchUrls.Url[1]", "WWW.JNLTESTJJ.COM");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.TerminationReasonCode", "04");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.Name", "M01");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.DoingBusinessAsName", "M02");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.Address", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PhoneNumber", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.AltPhoneNumber", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.CountrySubdivisionTaxId", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.NationalTaxId", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.ServiceProvLegal", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.ServiceProvDBA", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PrincipalMatch[0].Name", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PrincipalMatch[0].Address", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PrincipalMatch[0].PhoneNumber", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PrincipalMatch[0].AltPhoneNumber", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PrincipalMatch[0].NationalId", "M00");
            $this->customAssertEqual($ignoreAssert, $response, "TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PrincipalMatch[0].DriversLicense", "M00");
            

            self::putResponse("example_termination_inquiry", $response);
            
        }
        
    
    
    
    
    
    
    
}



