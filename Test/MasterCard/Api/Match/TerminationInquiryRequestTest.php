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
        ApiConfig::setDebug(true);
        ApiConfig::setSandbox(true);
        $privateKey = file_get_contents(getcwd()."/mcapi_sandbox_key.p12");
        ApiConfig::setAuthentication(new OAuthAuthentication("L5BsiPgaF-O3qA36znUATgQXwJB6MRoMSdhjd7wt50c97279!50596e52466e3966546d434b7354584c4975693238513d3d", $privateKey, "alias", "password"));
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
            $this->customAssertValue("0", $response->get("TerminationInquiry.PageOffset"));
            $this->customAssertValue("14", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TotalLength"));
            $this->customAssertValue("XYZTEST  XYZTECHMERCHANT", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Name"));
            $this->customAssertValue("XYZTEST  XYZTECHMERCHANT", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.DoingBusinessAsName"));
            $this->customAssertValue("1996", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.AddedByAcquirerID"));
            $this->customAssertValue("10/13/2015", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.AddedOnDate"));
            $this->customAssertValue("5675543210", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.PhoneNumber"));
            $this->customAssertValue("5672655441", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.AltPhoneNumber"));
            $this->customAssertValue("6700 BEN NEVIS", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Address.Line1"));
            $this->customAssertValue("GLASGOW", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Address.City"));
            $this->customAssertValue("MA", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Address.CountrySubdivision"));
            $this->customAssertValue("93137", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Address.PostalCode"));
            $this->customAssertValue("USA", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Address.Country"));
            $this->customAssertValue("*****", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.CountrySubdivisionTaxId"));
            $this->customAssertValue("*****", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.NationalTaxId"));
            $this->customAssertValue("TESTXYZ SVC PRVDER", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.ServiceProvLegal"));
            $this->customAssertValue("JNL ASSOC", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.ServiceProvDBA"));
            $this->customAssertValue("PAUL", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].FirstName"));
            $this->customAssertValue("HEMINGHOFF", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].LastName"));
            $this->customAssertValue("*****", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].NationalId"));
            $this->customAssertValue("3906541234", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].PhoneNumber"));
            $this->customAssertValue("4567390234", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].AltPhoneNumber"));
            $this->customAssertValue("2200 SHEPLEY DRIVE", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].Address.Line1"));
            $this->customAssertValue("SUITE 789", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].Address.Line2"));
            $this->customAssertValue("BROWNSVILLE", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].Address.City"));
            $this->customAssertValue("MO", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].Address.CountrySubdivision"));
            $this->customAssertValue("89022", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].Address.PostalCode"));
            $this->customAssertValue("USA", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].Address.Country"));
            $this->customAssertValue("*****", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].DriversLicense.Number"));
            $this->customAssertValue("MS", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].DriversLicense.CountrySubdivision"));
            $this->customAssertValue("USA", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.Principal[0].DriversLicense.Country"));
            $this->customAssertValue("WWW.TESTJJ.COM", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.UrlGroup[0].NoMatchUrls.Url[0]"));
            $this->customAssertValue("WWW.JNLTESTJJ.COM", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.UrlGroup[0].NoMatchUrls.Url[1]"));
            $this->customAssertValue("04", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].Merchant.TerminationReasonCode"));
            $this->customAssertValue("M01", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.Name"));
            $this->customAssertValue("M02", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.DoingBusinessAsName"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.Address"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PhoneNumber"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.AltPhoneNumber"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.CountrySubdivisionTaxId"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.NationalTaxId"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.ServiceProvLegal"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.ServiceProvDBA"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PrincipalMatch[0].Name"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PrincipalMatch[0].Address"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PrincipalMatch[0].PhoneNumber"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PrincipalMatch[0].AltPhoneNumber"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PrincipalMatch[0].NationalId"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[0].MerchantMatch.PrincipalMatch[0].DriversLicense"));
            $this->customAssertValue("XYZTEST  XYZTECHMERCHANT", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Name"));
            $this->customAssertValue("XYZTEST  XYZTECHMERCHANT", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.DoingBusinessAsName"));
            $this->customAssertValue("1996", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.AddedByAcquirerID"));
            $this->customAssertValue("01/20/2016", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.AddedOnDate"));
            $this->customAssertValue("5675543210", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.PhoneNumber"));
            $this->customAssertValue("5672655441", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.AltPhoneNumber"));
            $this->customAssertValue("6700 BEN NEVIS", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Address.Line1"));
            $this->customAssertValue("GLASGOW", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Address.City"));
            $this->customAssertValue("MA", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Address.CountrySubdivision"));
            $this->customAssertValue("93137", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Address.PostalCode"));
            $this->customAssertValue("USA", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Address.Country"));
            $this->customAssertValue("*****", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.CountrySubdivisionTaxId"));
            $this->customAssertValue("*****", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.NationalTaxId"));
            $this->customAssertValue("TESTXYZ SVC PRVDER", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.ServiceProvLegal"));
            $this->customAssertValue("JNL ASSOC", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.ServiceProvDBA"));
            $this->customAssertValue("PAUL", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].FirstName"));
            $this->customAssertValue("HEMINGHOFF", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].LastName"));
            $this->customAssertValue("*****", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].NationalId"));
            $this->customAssertValue("3906541234", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].PhoneNumber"));
            $this->customAssertValue("4567390234", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].AltPhoneNumber"));
            $this->customAssertValue("2200 SHEPLEY DRIVE", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].Address.Line1"));
            $this->customAssertValue("SUITE 789", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].Address.Line2"));
            $this->customAssertValue("BROWNSVILLE", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].Address.City"));
            $this->customAssertValue("MO", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].Address.CountrySubdivision"));
            $this->customAssertValue("89022", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].Address.PostalCode"));
            $this->customAssertValue("USA", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].Address.Country"));
            $this->customAssertValue("*****", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].DriversLicense.Number"));
            $this->customAssertValue("MS", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].DriversLicense.CountrySubdivision"));
            $this->customAssertValue("USA", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.Principal[0].DriversLicense.Country"));
            $this->customAssertValue("WWW.TESTJJ.COM", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.UrlGroup[0].NoMatchUrls.Url[0]"));
            $this->customAssertValue("WWW.JNLTESTJJ.COM", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.UrlGroup[0].NoMatchUrls.Url[1]"));
            $this->customAssertValue("04", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].Merchant.TerminationReasonCode"));
            $this->customAssertValue("M01", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.Name"));
            $this->customAssertValue("M02", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.DoingBusinessAsName"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.Address"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PhoneNumber"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.AltPhoneNumber"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.CountrySubdivisionTaxId"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.NationalTaxId"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.ServiceProvLegal"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.ServiceProvDBA"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PrincipalMatch[0].Name"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PrincipalMatch[0].Address"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PrincipalMatch[0].PhoneNumber"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PrincipalMatch[0].AltPhoneNumber"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PrincipalMatch[0].NationalId"));
            $this->customAssertValue("M00", $response->get("TerminationInquiry.PossibleMerchantMatches[0].TerminatedMerchant[1].MerchantMatch.PrincipalMatch[0].DriversLicense"));
            

            self::putResponse("example_termination_inquiry", $response);
        }
        
    
    
    
    
    
    
    
}



