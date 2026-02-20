<?php 

function getPropertyIDByToken($token, $conff) {
    
    $query = "SELECT propertyID FROM properties WHERE propertyToken = ?";
    $stmt = $conff->prepare($query);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['propertyID'];
    } else {
        return null;
    }
    

}

function getPropertyTypesByAvailability($availability, $conn) {
    // Accepts 'Sale' or 'Rent'
    $query = "SELECT * FROM propertytypes WHERE availableFor = ? OR availableFor = 'both'";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        return []; // Return empty array on error
    }
    
    $stmt->bind_param("s", $availability);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $propertyTypes = [];
    while ($row = $result->fetch_assoc()) {
        $propertyTypes[] = $row;
    }
    
    return $propertyTypes;
}


function getPropertyApplicationCount($propertyID, $conff) {
    
    $query = "SELECT COUNT(*) as application_count FROM arrange_viewing WHERE propertyID = ?";
    $stmt = $conff->prepare($query);
    $stmt->bind_param("i", $propertyID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['application_count'];
    } else {
        return 0;
    } }
    
    
    function getUserProfileFillStatus($userID, $con) {
        $messages = [];
        
        // Step 1: Get user data
        $stmt = $con->prepare("SELECT * FROM users WHERE userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $userResult = $stmt->get_result();
        $user = $userResult->fetch_assoc();
        if (!$user) return $messages;
        
        // Step 2: Check Basic User Profile
        $requiredFields = ['contact', 'apartment', 'city', 'locality', 'pinCode', 'country', 'profileimg'];
        $incompleteFields = [];
        foreach ($requiredFields as $field) {
            if (empty($user[$field])) {
                $incompleteFields[] = $field;
            }
        }
        if (!empty($incompleteFields)) {
            $messages[] = [
                'type' => 'warning',
                'message' => 'Your basic profile is incomplete. Please complete your profile details.',
                'action_text' => 'Complete Profile',
                'action_link' => 'dashbord.php?profile'
            ];
        }
        
        // Step 3: Check Email Verification
        if ($user['emailVerified'] === 'no') {
            $messages[] = [
                'type' => 'danger',
                'message' => 'Your email is not verified. Please verify your email to continue using all features.',
                'action_text' => 'Verify Email',
                'action_link' => 'dashbord.php?verifyEmailUser'
            ];
        }
        
        // Step 4: Check Agent Profile (if userType = Agent)
        if ($user['userType'] === 'Agent') {
            $stmt = $con->prepare("SELECT * FROM agents WHERE userID = ?");
            $stmt->bind_param("i", $userID);
            $stmt->execute();
            $agentResult = $stmt->get_result();
            $agent = $agentResult->fetch_assoc();
            
            if (!$agent) {
                $messages[] = [
                    'type' => 'info',
                    'message' => 'You have not created your agent profile yet. Complete it to start listing as an agent.',
                    'action_text' => 'Create Agent Profile',
                    'action_link' => 'dashbord.php?agent'
                ];
            } else {
                $agentRequired = ['agencyName', 'licenseNumber', 'operatinSince', 'publicEmail', 'publicContact', 'profileDescription'];
                $missingAgentFields = [];
                foreach ($agentRequired as $field) {
                    if (empty($agent[$field])) {
                        $missingAgentFields[] = $field;
                    }
                }
                
                if (!empty($missingAgentFields)) {
                    $messages[] = [
                        'type' => 'info',
                        'message' => 'Your agent profile is incomplete. Add missing details to get more visibility.',
                        'action_text' => 'Update Agent Profile',
                        'action_link' => 'dashbord.php?agent'
                    ];
                }
            }
        }
        
        // Step 5: Check Builder Profile (if userType = Builder)
        if ($user['userType'] === 'Builder') {
            $stmt = $con->prepare("SELECT * FROM builders WHERE userID = ?");
            $stmt->bind_param("i", $userID);
            $stmt->execute();
            $builderResult = $stmt->get_result();
            $builder = $builderResult->fetch_assoc();
            
            if (!$builder) {
                $messages[] = [
                    'type' => 'info',
                    'message' => 'You have not created your builder profile yet. Complete it to start listing projects.',
                    'action_text' => 'Create Builder Profile',
                    'action_link' => 'dashbord.php?builder'
                ];
            } else {
                $builderRequired = ['companyName', 'registrationNo', 'establishedYear', 'publicEmail', 'publicContact', 'aboutUs'];
                $missingBuilderFields = [];
                foreach ($builderRequired as $field) {
                    if (empty($builder[$field])) {
                        $missingBuilderFields[] = $field;
                    }
                }
                
                if (!empty($missingBuilderFields)) {
                    $messages[] = [
                        'type' => 'info',
                        'message' => 'Your builder profile is incomplete. Add missing details for better branding.',
                        'action_text' => 'Update Builder Profile',
                        'action_link' => 'dashbord.php?builder'
                    ];
                }
            }
        }
        
        return $messages;
    }
    
    function formatIndianShortNumber($number, $decimals = 2) {
        
        if (!is_numeric($number)) {
            return $number;
        }
        
        if ($number >= 10000000) { // Crore
            return round($number / 10000000, $decimals) . ' Cr';
        }
        elseif ($number >= 100000) { // Lakh
            return round($number / 100000, $decimals) . ' L';
        }
        elseif ($number >= 1000) { // Thousand
            return round($number / 1000, $decimals) . ' K';
        }
        else {
            return number_format($number);
        }
    }
    
    