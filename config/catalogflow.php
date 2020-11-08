<?php
return [
    "statuses" => [
        "fetched" => [
            "label" => "Fetched",
            "type" => "success",
            "selectable" => false
        ],
        "not_valid_pattern" => [
            "label" => "Not Valid Pattern",
            "type" => "danger",
            "selectable" => false
        ],
        "received" => [
            "label" => "Received",
            "type" => "success",
            "selectable" => true
        ],
        "validating" => [
            "label" => "Validating",
            "type" => "warning",
            "selectable" => false
        ],
        "validated" => [
            "label" => "Validated",
            "type" => "success",
            "selectable" => false
        ],
        "error" => [
            "label" => "Error",
            "type" => "danger",
            "selectable" => false
        ],
        "processing" => [
            "label" => "Processing",
            "type" => "warning",
            "selectable" => false
        ],
        "processed" => [
            "label" => "Processed",
            "type" => "success",
            "selectable" => true
        ],
        "uploading" => [
            "label" => "Uploading",
            "type" => "warning",
            "selectable" => false
        ],
        "uploaded" => [
            "label" => "Uploaded",
            "type" => "success",
            "selectable" => false
        ],
        "bucket_not_found" => [
            "label" => "Bucket Not Found",
            "type" => "danger",
            "selectable" => false
        ]
    ],
    "environments" => [
        "local" => [
            "label" => "Local",
            "type" => "success"
        ],
        "staging" => [
            "label" => "Staging",
            "type" => "warning"
        ],
        "production" => [
            "label" => "Production",
            "type" => "danger"
        ]
    ]
];